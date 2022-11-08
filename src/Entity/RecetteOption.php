<?php

namespace App\Entity;

use App\Repository\RecetteOptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteOptionRepository::class)]
class RecetteOption
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

    #[ORM\ManyToOne(targetEntity: Recette::class, inversedBy: 'options')]
    private $recette;

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

    public function getRecette(): ?Recette
    {
        return $this->recette;
    }

    public function setRecette(?Recette $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }
}
