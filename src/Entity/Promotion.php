<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'date')]
    private $dateDebutPromo;

    #[ORM\Column(type: 'date')]
    private $dateFinPromo;

    #[ORM\Column(type: 'float')]
    private $percentPromo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getDateDebutPromo(): ?\DateTimeInterface
    {
        return $this->dateDebutPromo;
    }

    public function setDateDebutPromo(\DateTimeInterface $dateDebutPromo): self
    {
        $this->dateDebutPromo = $dateDebutPromo;

        return $this;
    }

    public function getDateFinPromo(): ?\DateTimeInterface
    {
        return $this->dateFinPromo;
    }

    public function setDateFinPromo(\DateTimeInterface $dateFinPromo): self
    {
        $this->dateFinPromo = $dateFinPromo;

        return $this;
    }

    public function getPercentPromo(): ?float
    {
        return $this->percentPromo;
    }

    public function setPercentPromo(float $percentPromo): self
    {
        $this->percentPromo = $percentPromo;

        return $this;
    }
}
