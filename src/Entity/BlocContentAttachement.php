<?php

namespace App\Entity;

use App\Repository\BlocContentAttachementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlocContentAttachementRepository::class)]
class BlocContentAttachement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $path;

    #[ORM\Column(type: 'float', nullable: true)]
    private $size;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $extention;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lien;

    #[ORM\ManyToOne(targetEntity: BlocContent::class, inversedBy: 'blocContentAttachements')]
    private $blocContentId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getSize(): ?float
    {
        return $this->size;
    }

    public function setSize(?float $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getExtention(): ?string
    {
        return $this->extention;
    }

    public function setExtention(string $extention): self
    {
        $this->extention = $extention;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getBlocContentId(): ?BlocContent
    {
        return $this->blocContentId;
    }

    public function setBlocContentId(?BlocContent $blocContentId): self
    {
        $this->blocContentId = $blocContentId;

        return $this;
    }
}
