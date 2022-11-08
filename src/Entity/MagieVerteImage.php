<?php

namespace App\Entity;

use App\Repository\MagieVerteImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MagieVerteImageRepository::class)]
class MagieVerteImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: MagieVerte::class, inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private $magieVerte;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMagieVerte(): ?MagieVerte
    {
        return $this->magieVerte;
    }

    public function setMagieVerte(?MagieVerte $magieVerte): self
    {
        $this->magieVerte = $magieVerte;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
