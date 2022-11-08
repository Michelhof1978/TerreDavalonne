<?php

namespace App\Entity;

use App\Repository\CoachingVideoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachingVideoRepository::class)]
class CoachingVideo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $Duree;

    #[ORM\Column(type: 'float')]
    private $Price;

    #[ORM\ManyToOne(targetEntity: Type::class, inversedBy: 'coachingVideos')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?int
    {
        return $this->Duree;
    }

    public function setDuree(int $Duree): self
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}
