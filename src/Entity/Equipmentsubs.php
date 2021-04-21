<?php

namespace App\Entity;

use App\Repository\EquipmentsubsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmentsubsRepository::class)
 */
class Equipmentsubs
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
    private $mainname;

    /**
     * @ORM\Column(type="text")
     */
    private $subtext;

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

    public function getMainname(): ?string
    {
        return $this->mainname;
    }

    public function setMainname(string $mainname): self
    {
        $this->mainname = $mainname;

        return $this;
    }

    public function getSubtext(): ?string
    {
        return $this->subtext;
    }

    public function setSubtext(string $subtext): self
    {
        $this->subtext = $subtext;

        return $this;
    }
}
