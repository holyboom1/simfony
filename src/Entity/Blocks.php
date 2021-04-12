<?php

namespace App\Entity;

use App\Repository\BlocksRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlocksRepository::class)
 */
class Blocks
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\Column(type="text")
     */
    private $lang;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\Column(type="text")
     */
    private $subtext;

    /**
     * @ORM\Column(type="text")
     */
    private $alttext;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getSubText(): ?string
    {
        return $this->subtext;
    }

    public function setSubText(string $subtext): self
    {
        $this->subtext = $subtext;

        return $this;
    }

    public function getAltText(): ?string
    {
        return $this->alttext;
    }

    public function setAltText(string $alttext): self
    {
        $this->alttext = $alttext;

        return $this;
    }
}
