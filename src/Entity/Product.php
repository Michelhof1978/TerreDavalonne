<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $reference;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\Column(type: 'float')]
    private $poids;

    #[ORM\ManyToMany(targetEntity: ElementBase::class, inversedBy: 'products')]
    private $elementBase;

    #[ORM\ManyToMany(targetEntity: ElementPhyto::class, inversedBy: 'products')]
    private $elementPhyto;

    #[ORM\ManyToMany(targetEntity: ElementSabbat::class, inversedBy: 'products')]
    private $elementSabbat;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Stock::class)]
    private $stocks;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: OrderLigne::class)]
    private $orderLignes;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private $categoryId;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductImage::class, orphanRemoval: true, cascade: ['persist'])]
    private $images;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductOption::class, cascade: ['persist'])]
    private $options;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Comment::class)]
    private $comments;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $imageHeader;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $videoHeader;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $update_at;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $presentation;

    public function __construct()
    {
        $this->elementBase = new ArrayCollection();
        $this->elementPhyto = new ArrayCollection();
        $this->elementSabbat = new ArrayCollection();
        $this->stocks = new ArrayCollection();
        $this->orderLignes = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->options = new ArrayCollection();
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->update_at;
    }

    public function setUpdateAt(?\DateTimeImmutable $update_at): self
    {
        $this->update_at = $update_at;

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

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

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

    /**
     * @return Collection<int, Stock>
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks[] = $stock;
            $stock->setProduct($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getProduct() === $this) {
                $stock->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, OrderLigne>
     */
    public function getOrderLignes(): Collection
    {
        return $this->orderLignes;
    }

    public function addOrderLigne(OrderLigne $orderLigne): self
    {
        if (!$this->orderLignes->contains($orderLigne)) {
            $this->orderLignes[] = $orderLigne;
            $orderLigne->setProduct($this);
        }

        return $this;
    }

    public function removeOrderLigne(OrderLigne $orderLigne): self
    {
        if ($this->orderLignes->removeElement($orderLigne)) {
            // set the owning side to null (unless already changed)
            if ($orderLigne->getProduct() === $this) {
                $orderLigne->setProduct(null);
            }
        }

        return $this;
    }

    public function getCategoryId(): ?Category
    {
        return $this->categoryId;
    }

    public function setCategoryId(?Category $categoryId): self
    {
        $this->categoryId = $categoryId;

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

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ProductImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProduct($this);
        }

        return $this;
    }

    public function removeImage(ProductImage $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProduct() === $this) {
                $image->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(ProductOption $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setProduct($this);
        }

        return $this;
    }

    public function removeOption(ProductOption $option): self
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getProduct() === $this) {
                $option->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setProduct($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getProduct() === $this) {
                $comment->setProduct(null);
            }
        }

        return $this;
    }

    public function getImageHeader(): ?string
    {
        return $this->imageHeader;
    }

    public function setImageHeader(?string $imageHeader): self
    {
        $this->imageHeader = $imageHeader;

        return $this;
    }

    public function getVideoHeader(): ?string
    {
        return $this->videoHeader;
    }

    public function setVideoHeader(?string $videoHeader): self
    {
        $this->videoHeader = $videoHeader;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }
}
