<?php

namespace App\Entity;

use App\Repository\ConfigRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConfigRepository::class)
 */
class Config
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
    private $adminName;

    /**
     * @ORM\Column(type="text")
     */
    private $adminEmail;

    /**
     * @ORM\Column(type="text")
     */
    private $adminPhone;

    /**
     * @ORM\Column(type="text")
     */
    private $adress;

    /**
     * @ORM\Column(type="text")
     */
    private $maplink;

    /**
     * @ORM\Column(type="text")
     */
    private $developby;

    /**
     * @ORM\Column(type="text")
     */
    private $copyr;

    /**
     * @ORM\Column(type="text")
     */
    private $blockname;

    /**
     * @ORM\Column(type="text")
     */
    private $lang;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdminName(): ?string
    {
        return $this->adminName;
    }

    public function setAdminName(string $adminName): self
    {
        $this->adminName = $adminName;

        return $this;
    }

    public function getAdminEmail(): ?string
    {
        return $this->adminEmail;
    }

    public function setAdminEmail(string $adminEmail): self
    {
        $this->adminEmail = $adminEmail;

        return $this;
    }

    public function getAdminPhone(): ?string
    {
        return $this->adminPhone;
    }

    public function setAdminPhone(string $adminPhone): self
    {
        $this->adminPhone = $adminPhone;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getMaplink(): ?string
    {
        return $this->maplink;
    }

    public function setMaplink(string $maplink): self
    {
        $this->maplink = $maplink;

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

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getDevelopby(): ?string
    {
        return $this->developby;
    }

    public function setDevelopby(string $developby): self
    {
        $this->lang = $developby;

        return $this;
    }

    public function getCopyr(): ?string
    {
        return $this->copyr;
    }

    public function setCopyr(string $copyr): self
    {
        $this->lang = $copyr;

        return $this;
    }

}
