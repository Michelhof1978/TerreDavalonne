<?php

namespace App\Entity;

use App\Repository\ConfigBlocRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConfigBlocRepository::class)]
class ConfigBloc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $hauteur;

    #[ORM\Column(type: 'integer')]
    private $longueur;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $radius;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHauteur(): ?int
    {
        return $this->hauteur;
    }

    public function setHauteur(int $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(int $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getRadius(): ?int
    {
        return $this->radius;
    }

    public function setRadius(?int $radius): self
    {
        $this->radius = $radius;

        return $this;
    }
}
