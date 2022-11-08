<?php

namespace App\Entity;

use App\Repository\PlanteImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanteImageRepository::class)]
class PlanteImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Plante::class, inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private $plante;

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
        return $this->name;
    }
}
