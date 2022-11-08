<?php

namespace App\Entity;

use App\Repository\RecueilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecueilRepository::class)]
class Recueil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $word;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienVideo;

    #[ORM\ManyToOne(targetEntity: TypeRecueil::class, inversedBy: 'recueils')]
    private $typeRecueil;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienPhoto;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $update_at;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $presentation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWord(): ?string
    {
        return $this->word;
    }

    public function setWord(string $word): self
    {
        $this->word = $word;

        return $this;
    }

    public function getLienVideo(): ?string
    {
        return $this->lienVideo;
    }

    public function setLienVideo(string $lienVideo): self
    {
        $this->lienVideo = $lienVideo;

        return $this;
    }

    public function getTypeRecueil(): ?TypeRecueil
    {
        return $this->typeRecueil;
    }

    public function setTypeRecueil(?TypeRecueil $typeRecueil): self
    {
        $this->typeRecueil = $typeRecueil;

        return $this;
    }

    public function getLienPhoto(): ?string
    {
        return $this->lienPhoto;
    }

    public function setLienPhoto(string $lienPhoto): self
    {
        $this->lienPhoto = $lienPhoto;

        return $this;
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

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->update_at;
    }

    public function setUpdateAt(?\DateTimeImmutable $update_at): self
    {
        $this->update_at = $update_at;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }
}
