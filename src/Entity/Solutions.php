<?php

namespace App\Entity;

use App\Repository\SolutionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolutionsRepository::class)
 */
class Solutions
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
    private $mainname;

    /**
     * @ORM\Column(type="text")
     */
    private $blockname;

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

    public function getMainname(): ?string
    {
        return $this->mainname;
    }

    public function setMainname(string $mainname): self
    {
        $this->mainname = $mainname;

        return $this;
    }

    public function getBlockname(): ?string
    {
        return $this->blockname;
    }

    public function setBlockname(string $blockname): self
    {
        $this->blockname = $blockname;

        return $this;
    }
}
