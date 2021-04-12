<?php

namespace App\Entity;

use App\Repository\SliderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SliderRepository::class)
 */
class Slider
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $lang;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $text1;

    /**
     * @ORM\Column(type="text")
     */
    private $text2;

    /**
     * @ORM\Column(type="text")
     */
    private $text3;

    /**
     * @ORM\Column(type="text")
     */
    private $imgurl;

    /**
     * @ORM\Column(type="text")
     */
    private $img2url;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getText1(): ?string
    {
        return $this->text1;
    }

    public function setText1(string $text1): self
    {
        $this->text1 = $text1;

        return $this;
    }

    public function getText2(): ?string
    {
        return $this->text2;
    }

    public function setText2(string $text2): self
    {
        $this->text2 = $text2;

        return $this;
    }

    public function getText3(): ?string
    {
        return $this->text3;
    }

    public function setText3(string $text3): self
    {
        $this->text3 = $text3;

        return $this;
    }

    public function getImgurl(): ?string
    {
        return $this->imgurl;
    }

    public function setImgurl(string $imgurl): self
    {
        $this->imgurl = $imgurl;

        return $this;
    }

    public function getImg2url(): ?string
    {
        return $this->img2url;
    }

    public function setImg2url(string $img2url): self
    {
        $this->img2url = $img2url;

        return $this;
    }
}
