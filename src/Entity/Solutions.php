<?php

namespace App\Entity;

use App\Repository\SolutionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

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

    /**
     * @ORM\OneToMany(targetEntity=Solutionsitems::class, mappedBy="cat")
     */
    private $cat;

    public function __construct()
    {

        $this->cat = new ArrayCollection();
    }



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

    /**
     * @return Collection|Solutionsitems[]
     */
    public function getCat(): Collection
    {
        return $this->cat;
    }

    public function addCat(Solutionsitems $cat): self
    {
        if (!$this->cat->contains($cat)) {
            $this->cat[] = $cat;
            $cat->setCat($this);
        }

        return $this;
    }

    public function removeCat(Solutionsitems $cat): self
    {
        if ($this->cat->removeElement($cat)) {
            // set the owning side to null (unless already changed)
            if ($cat->getCat() === $this) {
                $cat->setCat(null);
            }
        }

        return $this;
    }

//    public function __toString()
//    {
//        return $this->mainname; // <-- add here a real property which
//    }

}
