<?php

namespace App\Entity;

use App\Repository\TypeRecueilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRecueilRepository::class)]
class TypeRecueil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'typeRecueil', targetEntity: Recueil::class)]
    private $recueils;

    public function __construct()
    {
        $this->recueils = new ArrayCollection();
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

    /**
     * @return Collection<int, Recueil>
     */
    public function getRecueils(): Collection
    {
        return $this->recueils;
    }

    public function addRecueil(Recueil $recueil): self
    {
        if (!$this->recueils->contains($recueil)) {
            $this->recueils[] = $recueil;
            $recueil->setTypeRecueil($this);
        }

        return $this;
    }

    public function removeRecueil(Recueil $recueil): self
    {
        if ($this->recueils->removeElement($recueil)) {
            // set the owning side to null (unless already changed)
            if ($recueil->getTypeRecueil() === $this) {
                $recueil->setTypeRecueil(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
