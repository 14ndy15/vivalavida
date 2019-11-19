<?php


namespace App\Entity;


use Symfony\Component\Debug\Exception\UndefinedMethodException;

trait LanguageSessionTrait
{
    public function getSessionLang()
    {
        /// Los valores que tomara son los admitidos en las rutas del controlador
        return isset($_SESSION['_locale'])? $_SESSION['_locale']: 'en';
    }

    public function getLocale($methodName)
    {
        $vars = get_object_vars($this);
        switch ($this->getSessionLang()) {
            case 'es':
                $methodName .= 'Es';
                break;
            case 'de':
                $methodName .= 'De';
                break;
            default:
                $methodName .= 'En';
                break;
        }
        return $vars[$methodName];
    }




}