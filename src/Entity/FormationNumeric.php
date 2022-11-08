<?php

namespace App\Entity;

use App\Repository\FormationNumericRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationNumericRepository::class)]
class FormationNumeric
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienVideo;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\ManyToMany(targetEntity: ElementBase::class, inversedBy: 'formationNumerics')]
    private $elementBase;

    #[ORM\ManyToMany(targetEntity: ElementPhyto::class, inversedBy: 'formationNumerics')]
    private $elementPhyto;

    #[ORM\ManyToMany(targetEntity: ElementSabbat::class, inversedBy: 'formationNumerics')]
    private $elementSabbat;

    #[ORM\ManyToOne(targetEntity: Type::class, inversedBy: 'formationNumerics')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    public function __construct()
    {
        $this->elementBase = new ArrayCollection();
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

    public function getLienVideo(): ?string
    {
        return $this->lienVideo;
    }

    public function setLienVideo(string $lienVideo): self
    {
        $this->lienVideo = $lienVideo;

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
