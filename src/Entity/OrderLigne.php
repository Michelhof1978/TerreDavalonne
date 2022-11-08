<?php

namespace App\Entity;

use App\Repository\OrderLigneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderLigneRepository::class)]
class OrderLigne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float')]
    private $quantity;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'orderLignes')]
    private $product;

    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: 'ligneCommande')]
    #[ORM\JoinColumn(nullable: false)]
    private $commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }
}
