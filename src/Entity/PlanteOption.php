<?php

namespace App\Entity;

use App\Repository\PlanteOptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanteOptionRepository::class)]
class PlanteOption
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

    #[ORM\ManyToOne(targetEntity: Plante::class, inversedBy: 'options')]
    private $plante;

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

    public function getPlante(): ?Plante
    {
        return $this->plante;
    }

    public function setPlante(?Plante $plante): self
    {
        $this->plante = $plante;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }
}
