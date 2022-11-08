<?php

namespace App\Entity;

use App\Repository\ProductOptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductOptionRepository::class)]
class ProductOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: TypeOptions::class, inversedBy: 'options')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'options')]
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?TypeOptions
    {
        return $this->type;
    }

    public function setType(?TypeOptions $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function __toString()
    {
        return $this->id;
    }
}
