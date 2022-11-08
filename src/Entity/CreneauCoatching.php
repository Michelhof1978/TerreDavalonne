<?php

namespace App\Entity;

use App\Repository\CreneauCoatchingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreneauCoatchingRepository::class)]
class CreneauCoatching
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'time')]
    private $heureDebut;

    #[ORM\Column(type: 'time')]
    private $heureFin;

    #[ORM\Column(type: 'boolean')]
    private $isFree;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'creneauCoatchings')]
    private $user;

    #[ORM\Column(type: 'date')]
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getIsFree(): ?bool
    {
        return $this->isFree;
    }

    public function setIsFree(bool $isFree): self
    {
        $this->isFree = $isFree;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function isIsFree(): ?bool
    {
        return $this->isFree;
    }
}
