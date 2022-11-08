<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $numberPlace;

    #[ORM\Column(type: 'date')]
    private $dateCreation;

    #[ORM\Column(type: 'date')]
    private $dateDebutEvenement;

    #[ORM\Column(type: 'date')]
    private $dateFinEvenement;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\ManyToMany(targetEntity: ElementBase::class, inversedBy: 'evenements')]
    private $elementbases;

    #[ORM\ManyToMany(targetEntity: ElementPhyto::class, inversedBy: 'evenements')]
    private $elementPhyto;

    #[ORM\ManyToMany(targetEntity: ElementSabbat::class, inversedBy: 'evenements')]
    private $elementSabbat;

    #[ORM\ManyToOne(targetEntity: Type::class, inversedBy: 'evenements')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienPhoto;

    #[ORM\Column(type: 'string', length: 255)]
    private $presentation;

    public function __construct()
    {
        $this->elementbases = new ArrayCollection();
        $this->elementPhyto = new ArrayCollection();
        $this->elementSabbat = new ArrayCollection();
    }

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

    public function getNumberPlace(): ?int
    {
        return $this->numberPlace;
    }

    public function setNumberPlace(int $numberPlace): self
    {
        $this->numberPlace = $numberPlace;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateDebutEvenement(): ?\DateTimeInterface
    {
        return $this->dateDebutEvenement;
    }

    public function setDateDebutEvenement(\DateTimeInterface $dateDebutEvenement): self
    {
        $this->dateDebutEvenement = $dateDebutEvenement;

        return $this;
    }

    public function getDateFinEvenement(): ?\DateTimeInterface
    {
        return $this->dateFinEvenement;
    }

    public function setDateFinEvenement(\DateTimeInterface $dateFinEvenement): self
    {
        $this->dateFinEvenement = $dateFinEvenement;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, ElementBase>
     */
    public function getElementbases(): Collection
    {
        return $this->elementbases;
    }

    public function addElementbase(ElementBase $elementbase): self
    {
        if (!$this->elementbases->contains($elementbase)) {
            $this->elementbases[] = $elementbase;
        }

        return $this;
    }

    public function removeElementbase(ElementBase $elementbase): self
    {
        $this->elementbases->removeElement($elementbase);

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

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }
}
