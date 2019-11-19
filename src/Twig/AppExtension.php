<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Twig\AppRuntime;


class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('filterSrcset', [AppRuntime::class, 'filterSrcset']),
            new TwigFilter('truncate_html', [$this, 'truncate_html']),
        ];
    }


 	public function getFunctions()
    {
        return [
            new TwigFunction('in_string', [$this, 'in_string']),
            new TwigFunction('imgTagContent', [AppRuntime::class, 'imgTagContent']),
        ];
    }


    public function in_string(string $haystack, string $needle)
    {
        if(stripos($haystack, $needle) === false)
        	return false;
        return true;
    }

    /**
    * truncate()
    *
    * Truncates a HTML string to a given length of _visible_ (content) characters.
    * E.g.
    * "This is some <b>bold</b> text" has a visible/content length of 22 characters,
    * though the total string length is 29 characters.
    * This function allows you to limit the visible/content length whilst preserving any HTML formatting.
    *
    * @param $text
    * @param int $length
    * @param string $ending
    * @param bool $exact
    * @param bool $considerHtml
    * @return string
    * @internal param string $html
    * @access public
    */
    public function truncate_html($text, $length = 100, $ending = '', $exact = false, $considerHtml = true)
    {
        if (!is_string($text)) {
            trigger_error('Function \'truncate_html\' expects argument 1 to be an string', E_USER_ERROR);
            return false;
        }
        if (mb_strlen(strip_tags($text)) <= $length) {
            return $text;
        }
        $openTags = array();
        if ($considerHtml) {
            // if the plain text is shorter than the maximum length, return the whole text
            if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
                return $text;
            }
            // splits all html-tags to scanable lines
            preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
            $totalLength = strlen($ending);
            $truncate = '';
            foreach ($lines as $lineMatchings) {
                // if there is any html-tag in this line, handle it and add it (uncounted) to the output
                if (!empty($lineMatchings[1])) {
                    // if it's an "empty element" with or without xhtml-conform closing slash
                    if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $lineMatchings[1])) {
                        // do nothing
                        // if tag is a closing tag
                    } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $lineMatchings[1], $tagMatchings)) {
                        // delete tag from $openTags list
                        $pos = array_search($tagMatchings[1], $openTags);
                        if ($pos !== false) {
                            unset($openTags[$pos]);
                        }
                        // if tag is an opening tag
                    } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $lineMatchings[1], $tagMatchings)) {
                        // add tag to the beginning of $openTags list
                        array_unshift($openTags, strtolower($tagMatchings[1]));
                    }
                    // add html-tag to $truncate'd text
                    $truncate .= $lineMatchings[1];
                }
                // calculate the length of the plain text part of the line; handle entities as one character
                $contentLength = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $lineMatchings[2]));
                if ($totalLength+$contentLength> $length) {
                    // the number of characters which are left
                    $left = $length - $totalLength;
                    $entitiesLength = 0;
                    // search for html entities
                    if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $lineMatchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                        // calculate the real length of all entities in the legal range
                        foreach ($entities[0] as $entity) {
                            if ($entity[1]+1-$entitiesLength <= $left) {
                                $left--;
                                $entitiesLength += strlen($entity[0]);
                            } else {
                                // no more characters left
                                break;
                            }
                        }
                    }
                    $truncate .= substr($lineMatchings[2], 0, $left+$entitiesLength);
                    // maximum lenght is reached, so get off the loop
                    break;
                } else {
                    $truncate .= $lineMatchings[2];
                    $totalLength += $contentLength;
                }
                // if the maximum length is reached, get off the loop
                if($totalLength>= $length) {
                    break;
                }
            }
        } else {
            if (strlen($text) <= $length) {
                return $text;
            } else {
                $truncate = substr($text, 0, $length - strlen($ending));
            }
        }
        // if the words shouldn't be cut in the middle...
        if (!$exact) {
            // ...search the last occurance of a space...
            $spacepos = strrpos($truncate, ' ');
            if (isset($spacepos)) {
                // ...and cut the text in this position
                $truncate = substr($truncate, 0, $spacepos);
            }
        }
        // add the defined ending to the text
        $truncate .= $ending;
        if($considerHtml) {
            // close all unclosed html-tags
            foreach ($openTags as $tag) {
                $truncate .= '</' . $tag . '>';
            }
        }
        return $truncate;
    }
} 
