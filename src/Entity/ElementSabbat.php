<?php

namespace App\Entity;

use App\Repository\ElementSabbatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElementSabbatRepository::class)]
class ElementSabbat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'date')]
    private $datedebutsabbat;

    #[ORM\Column(type: 'date')]
    private $datefinsabbat;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titrevideo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lienvideo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lienimage;

    #[ORM\Column(type: 'text', nullable: true)]
    private $motintroduction;

    #[ORM\Column(type: 'text', nullable: true)]
    private $text;

    #[ORM\ManyToMany(targetEntity: Evenement::class, mappedBy: 'elmentSabbat')]
    private $evenements;

    #[ORM\ManyToMany(targetEntity: FormationNumeric::class, mappedBy: 'elementSabbat')]
    private $formationNumerics;

    #[ORM\ManyToMany(targetEntity: Product::class, mappedBy: 'elementSabbat')]
    private $products;

    #[ORM\ManyToMany(targetEntity: ConseilDuNaturo::class, mappedBy: 'elementSabbat')]
    private $conseilDuNaturos;
    #[ORM\ManyToMany(targetEntity: MagieVerte::class, mappedBy: 'elementSabbat')]
    private $magieVertes;

    #[ORM\ManyToMany(targetEntity: Plante::class, mappedBy: 'elementSabbats')]
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

    public function getDatedebutsabbat(): ?\DateTimeInterface
    {
        return $this->datedebutsabbat;
    }

    public function setDatedebutsabbat(\DateTimeInterface $datedebutsabbat): self
    {
        $this->datedebutsabbat = $datedebutsabbat;

        return $this;
    }

    public function getDatefinsabbat(): ?\DateTimeInterface
    {
        return $this->datefinsabbat;
    }

    public function setDatefinsabbat(\DateTimeInterface $datefinsabbat): self
    {
        $this->datefinsabbat = $datefinsabbat;

        return $this;
    }

    public function getTitrevideo(): ?string
    {
        return $this->titrevideo;
    }

    public function setTitrevideo(?string $titrevideo): self
    {
        $this->titrevideo = $titrevideo;

        return $this;
    }

    public function getLienvideo(): ?string
    {
        return $this->lienvideo;
    }

    public function setLienvideo(?string $lienvideo): self
    {
        $this->lienvideo = $lienvideo;

        return $this;
    }

    public function getLienimage(): ?string
    {
        return $this->lienimage;
    }

    public function setLienimage(?string $lienimage): self
    {
        $this->lienimage = $lienimage;

        return $this;
    }

    public function getMotintroduction(): ?string
    {
        return $this->motintroduction;
    }

    public function setMotintroduction(?string $motintroduction): self
    {
        $this->motintroduction = $motintroduction;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

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
            $evenement->addElementSabbat($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            $evenement->removeElementSabbat($this);
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
            $formationNumeric->addElementSabbat($this);
        }

        return $this;
    }

    public function removeFormationNumeric(FormationNumeric $formationNumeric): self
    {
        if ($this->formationNumerics->removeElement($formationNumeric)) {
            $formationNumeric->removeElementSabbat($this);
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
            $product->addElementSabbat($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeElementSabbat($this);
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
            $conseilDuNaturo->addElementSabbat($this);
        }

        return $this;
    }

    public function removeConseilDuNaturo(ConseilDuNaturo $conseilDuNaturo): self
    {
        if ($this->conseilDuNaturos->removeElement($conseilDuNaturo)) {
            $conseilDuNaturo->removeElementSabbat($this);
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
            $magieVerte->addElementSabbat($this);
        }

        return $this;
    }

    public function removeMagieVerte(MagieVerte $magieVerte): self
    {
        if ($this->magieVertes->removeElement($magieVerte)) {
            $magieVerte->removeElementSabbat($this);
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
            $plante->addElementSabbat($this);
        }

        return $this;
    }

    public function removePlante(Plante $plante): self
    {
        if ($this->plantes->removeElement($plante)) {
            $plante->removeElementSabbat($this);
        }

        return $this;
    }
}
