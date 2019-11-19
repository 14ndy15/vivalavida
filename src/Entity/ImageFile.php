<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageFileRepository")
 * @ORM\HasLifecycleCallbacks
 */
class ImageFile extends ImageField
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUploadDir()
    {
        return 'gallery';
    }

    public function __toString() : string
    {
        $label = $this->id;

        if ($this->name != null)
            $label = $this->name.'-'.$label;
        if ($this->category != null)
            $label = $this->category.'-'.$label;
        return $label;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

}
