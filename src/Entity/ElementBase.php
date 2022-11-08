<?php

namespace App\Entity;

use App\Repository\ElementBaseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElementBaseRepository::class)]
class ElementBase
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $color;

    #[ORM\ManyToMany(targetEntity: Evenement::class, mappedBy: 'elementbases')]
    private $evenements;

    #[ORM\ManyToMany(targetEntity: FormationNumeric::class, mappedBy: 'elementBase')]
    private $formationNumerics;

    #[ORM\ManyToMany(targetEntity: Product::class, mappedBy: 'elementBase')]
    private $products;

    #[ORM\ManyToMany(targetEntity: ConseilDuNaturo::class, mappedBy: 'elementBase')]
    private $conseilDuNaturos;
    #[ORM\ManyToMany(targetEntity: MagieVerte::class, mappedBy: 'elementBase')]
    private $magieVertes;

    #[ORM\ManyToMany(targetEntity: Plante::class, mappedBy: 'elementBases')]
    private $plantes;
    public function __construct()
    {
        $this->evenements = new ArrayCollection();
        $this->formationNumerics = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->conseilDuNaturos = new ArrayCollection();
        $this->magieVertes = new ArrayCollection();
        $this->plantes = new ArrayCollection();
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

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->addElementbase($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            $evenement->removeElementbase($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, FormationNumeric>
     */
    public function getFormationNumerics(): Collection
    {
        return $this->formationNumerics;
    }

    public function addFormationNumeric(FormationNumeric $formationNumeric): self
    {
        if (!$this->formationNumerics->contains($formationNumeric)) {
            $this->formationNumerics[] = $formationNumeric;
            $formationNumeric->addElementBase($this);
        }

        return $this;
    }

    public function removeFormationNumeric(FormationNumeric $formationNumeric): self
    {
        if ($this->formationNumerics->removeElement($formationNumeric)) {
            $formationNumeric->removeElementBase($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addElementBase($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeElementBase($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ConseilDuNaturo>
     */
    public function getConseilDuNaturos(): Collection
    {
        return $this->conseilDuNaturos;
    }

    public function addConseilDuNaturo(ConseilDuNaturo $conseilDuNaturo): self
    {
        if (!$this->conseilDuNaturos->contains($conseilDuNaturo)) {
            $this->conseilDuNaturos[] = $conseilDuNaturo;
            $conseilDuNaturo->addElementBase($this);
        }

        return $this;
    }

    public function removeConseilDuNaturo(ConseilDuNaturo $conseilDuNaturo): self
    {
        if ($this->conseilDuNaturos->removeElement($conseilDuNaturo)) {
            $conseilDuNaturo->removeElementBase($this);
        }

        return $this;
    }


    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection<int, MagieVerte>
     */
    public function getMagieVertes(): Collection
    {
        return $this->magieVertes;
    }

    public function addMagieVerte(MagieVerte $magieVerte): self
    {
        if (!$this->magieVertes->contains($magieVerte)) {
            $this->magieVertes[] = $magieVerte;
            $magieVerte->addElementBase($this);
        }

        return $this;
    }

    public function removeMagieVerte(MagieVerte $magieVerte): self
    {
        if ($this->magieVertes->removeElement($magieVerte)) {
            $magieVerte->removeElementBase($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Plante>
     */
    public function getPlantes(): Collection
    {
        return $this->plantes;
    }

    public function addPlante(Plante $plante): self
    {
        if (!$this->plantes->contains($plante)) {
            $this->plantes[] = $plante;
            $plante->addElementBasis($this);
        }

        return $this;
    }

    public function removePlante(Plante $plante): self
    {
        if ($this->plantes->removeElement($plante)) {
            $plante->removeElementBasis($this);
        }

        return $this;
    }
}
