<?php

namespace App\Entity;

use App\Repository\ElementPhytoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElementPhytoRepository::class)]
class ElementPhyto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'elementPhytos')]
    private $parentPhyto;

    #[ORM\OneToMany(mappedBy: 'parentPhyto', targetEntity: self::class)]
    private $elementPhytos;

    #[ORM\ManyToMany(targetEntity: Evenement::class, mappedBy: 'elementPhyto')]
    private $evenements;

    #[ORM\ManyToMany(targetEntity: FormationNumeric::class, mappedBy: 'elementPhyto')]
    private $formationNumerics;

    #[ORM\ManyToMany(targetEntity: Product::class, mappedBy: 'elementPhyto')]
    private $products;

    #[ORM\ManyToMany(targetEntity: ConseilDuNaturo::class, mappedBy: 'elementPhyto')]
    private $conseilDuNaturos;
    #[ORM\ManyToMany(targetEntity: MagieVerte::class, mappedBy: 'elementPhyto')]
    private $magieVertes;

    #[ORM\ManyToMany(targetEntity: Plante::class, mappedBy: 'elementPhytos')]
    private $plantes;

    public function __construct()
    {
        $this->elementPhytos = new ArrayCollection();
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

    public function getParentPhyto(): ?self
    {
        return $this->parentPhyto;
    }

    public function setParentPhyto(?self $parentPhyto): self
    {
        $this->parentPhyto = $parentPhyto;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getElementPhytos(): Collection
    {
        return $this->elementPhytos;
    }

    public function addElementPhyto(self $elementPhyto): self
    {
        if (!$this->elementPhytos->contains($elementPhyto)) {
            $this->elementPhytos[] = $elementPhyto;
            $elementPhyto->setParentPhyto($this);
        }

        return $this;
    }

    public function removeElementPhyto(self $elementPhyto): self
    {
        if ($this->elementPhytos->removeElement($elementPhyto)) {
            // set the owning side to null (unless already changed)
            if ($elementPhyto->getParentPhyto() === $this) {
                $elementPhyto->setParentPhyto(null);
            }
        }

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
            $evenement->addElementPhyto($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            $evenement->removeElementPhyto($this);
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
            $formationNumeric->addElementPhyto($this);
        }

        return $this;
    }

    public function removeFormationNumeric(FormationNumeric $formationNumeric): self
    {
        if ($this->formationNumerics->removeElement($formationNumeric)) {
            $formationNumeric->removeElementPhyto($this);
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
            $product->addElementPhyto($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeElementPhyto($this);
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
            $conseilDuNaturo->addElementPhyto($this);
        }

        return $this;
    }

    public function removeConseilDuNaturo(ConseilDuNaturo $conseilDuNaturo): self
    {
        if ($this->conseilDuNaturos->removeElement($conseilDuNaturo)) {
            $conseilDuNaturo->removeElementPhyto($this);
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
            $magieVerte->addElementPhyto($this);
        }

        return $this;
    }

    public function removeMagieVerte(MagieVerte $magieVerte): self
    {
        if ($this->magieVertes->removeElement($magieVerte)) {
            $magieVerte->removeElementPhyto($this);
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
            $plante->addElementPhyto($this);
        }

        return $this;
    }

    public function removePlante(Plante $plante): self
    {
        if ($this->plantes->removeElement($plante)) {
            $plante->removeElementPhyto($this);
        }

        return $this;
    }
}
