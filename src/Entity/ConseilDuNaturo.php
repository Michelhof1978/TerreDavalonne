<?php

namespace App\Entity;

use App\Repository\ConseilDuNaturoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConseilDuNaturoRepository::class)]
class ConseilDuNaturo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $conseil;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienVideo;

    #[ORM\ManyToMany(targetEntity: ElementBase::class, inversedBy: 'conseilDuNaturos')]
    private $elementBase;

    #[ORM\ManyToMany(targetEntity: ElementPhyto::class, inversedBy: 'conseilDuNaturos')]
    private $elementPhyto;

    #[ORM\ManyToMany(targetEntity: ElementSabbat::class, inversedBy: 'conseilDuNaturos')]
    private $elementSabbat;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lienPhoto;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $update_at;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $presentation;

    public function __construct()
    {
        $this->elementBase = new ArrayCollection();
        $this->elementPhyto = new ArrayCollection();
        $this->elementSabbat = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConseil(): ?string
    {
        return $this->conseil;
    }

    public function setConseil(string $conseil): self
    {
        $this->conseil = $conseil;

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

    /**
     * @return Collection<int, ElementBase>
     */
    public function getElementBase(): Collection
    {
        return $this->elementBase;
    }

    public function addElementBase(ElementBase $elementBase): self
    {
        if (!$this->elementBase->contains($elementBase)) {
            $this->elementBase[] = $elementBase;
        }

        return $this;
    }

    public function removeElementBase(ElementBase $elementBase): self
    {
        $this->elementBase->removeElement($elementBase);

        return $this;
    }

    /**
     * @return Collection<int, ElementPhyto>
     */
    public function getElementPhyto(): Collection
    {
        return $this->elementPhyto;
    }

    public function addElementPhyto(ElementPhyto $elementPhyto): self
    {
        if (!$this->elementPhyto->contains($elementPhyto)) {
            $this->elementPhyto[] = $elementPhyto;
        }

        return $this;
    }

    public function removeElementPhyto(ElementPhyto $elementPhyto): self
    {
        $this->elementPhyto->removeElement($elementPhyto);

        return $this;
    }

    /**
     * @return Collection<int, ElementSabbat>
     */
    public function getElementSabbat(): Collection
    {
        return $this->elementSabbat;
    }

    public function addElementSabbat(ElementSabbat $elementSabbat): self
    {
        if (!$this->elementSabbat->contains($elementSabbat)) {
            $this->elementSabbat[] = $elementSabbat;
        }

        return $this;
    }

    public function removeElementSabbat(ElementSabbat $elementSabbat): self
    {
        $this->elementSabbat->removeElement($elementSabbat);

        return $this;
    }

    public function getLienPhoto(): ?string
    {
        return $this->lienPhoto;
    }

    public function setLienPhoto(?string $lienPhoto): self
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
