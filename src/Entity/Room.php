<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Room
{
    use LanguageSessionTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $textEn;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $textDe;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $textEs;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ImageFile")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $imagesGallery;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $price;


    public function __construct()
    {
        $this->imagesGallery = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTextDe(): ?string
    {
        return $this->textDe;
    }

    public function setTextDe(string $textDe): self
    {
        $this->textDe = $textDe;

        return $this;
    }

    public function getTextEs(): ?string
    {
        return $this->textEs;
    }

    public function setTextEs(string $textEs): self
    {
        $this->textEs = $textEs;

        return $this;
    }

    public function getTextEn(): ?string
    {
        return $this->textEn;
    }

    public function setTextEn(string $textEn): self
    {
        $this->textEn = $textEn;

        return $this;
    }


    /**
     * @return Collection|ImageFile[]
     */
    public function getImagesGallery(): Collection
    {
        return $this->imagesGallery;
    }

    public function addImagesGallery(ImageFile $imagesGallery): self
    {
        if (!$this->imagesGallery->contains($imagesGallery)) {
            $this->imagesGallery[] = $imagesGallery;
        }

        return $this;
    }

    public function removeImagesGallery(ImageFile $imagesGallery): self
    {
        if ($this->imagesGallery->contains($imagesGallery)) {
            $this->imagesGallery->removeElement($imagesGallery);
        }

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

}
