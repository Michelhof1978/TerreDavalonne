<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockRepository::class)]
class Stock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $dateMouvement;

    #[ORM\Column(type: 'boolean')]
    private $sensMouvement;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'stocks')]
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMouvement(): ?\DateTimeInterface
    {
        return $this->dateMouvement;
    }

    public function setDateMouvement(\DateTimeInterface $dateMouvement): self
    {
        $this->dateMouvement = $dateMouvement;

        return $this;
    }

    public function getSensMouvement(): ?bool
    {
        return $this->sensMouvement;
    }

    public function setSensMouvement(bool $sensMouvement): self
    {
        $this->sensMouvement = $sensMouvement;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

    public function isSensMouvement(): ?bool
    {
        return $this->sensMouvement;
    }
}
