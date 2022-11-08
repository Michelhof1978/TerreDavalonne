<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\ManyToOne(targetEntity: StatutOrder::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $statut;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: OrderLigne::class, orphanRemoval: true)]
    private $ligneCommande;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    public function __construct()
    {
        $this->ligneCommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getStatut(): ?StatutOrder
    {
        return $this->statut;
    }

    public function setStatut(?StatutOrder $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection<int, OrderLigne>
     */
    public function getLigneCommande(): Collection
    {
        return $this->ligneCommande;
    }

    public function addLigneCommande(OrderLigne $ligneCommande): self
    {
        if (!$this->ligneCommande->contains($ligneCommande)) {
            $this->ligneCommande[] = $ligneCommande;
            $ligneCommande->setCommande($this);
        }

        return $this;
    }

    public function removeLigneCommande(OrderLigne $ligneCommande): self
    {
        if ($this->ligneCommande->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getCommande() === $this) {
                $ligneCommande->setCommande(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
