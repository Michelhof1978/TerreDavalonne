<?php

namespace App\Entity;

use App\Repository\MagieVerteOptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MagieVerteOptionRepository::class)]
class MagieVerteOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: TypeOptions::class, inversedBy: 'options')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\ManyToOne(targetEntity: MagieVerte::class, inversedBy: 'options')]
    private $magieVerte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?TypeOptions
    {
        return $this->type;
    }

    public function setType(?TypeOptions $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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
        return $this->id;
    }
}
