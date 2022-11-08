<?php

namespace App\Entity;

use App\Repository\MagieVerteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MagieVerteRepository::class)]
class MagieVerte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\ManyToMany(targetEntity: ElementBase::class, inversedBy: 'magieVertes')]
    private $elementBase;

    #[ORM\ManyToMany(targetEntity: ElementPhyto::class, inversedBy: 'magieVertes')]
    private $elementPhyto;

    #[ORM\ManyToMany(targetEntity: ElementSabbat::class, inversedBy: 'magieVertes')]
    private $elementSabbat;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $imageHeader;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $videoHeader;

    #[ORM\OneToMany(mappedBy: 'magieVerte', targetEntity: MagieVerteImage::class, orphanRemoval: true, cascade: ['persist'])]
    private $images;

    #[ORM\OneToMany(mappedBy: 'magieVerte', targetEntity: MagieVerteOption::class, cascade: ['persist'])]
    private $options;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $update_at;

    #[ORM\OneToMany(mappedBy: 'magieVerte', targetEntity: Comment::class)]
    private $comments;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $presentation;

    public function __construct()
    {
        $this->elementBase = new ArrayCollection();
        $this->elementPhyto = new ArrayCollection();
        $this->elementSabbat = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->options = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTradiction(): ?string
    {
        return $this->tradiction;
    }

    public function setTradiction(?string $tradiction): self
    {
        $this->tradiction = $tradiction;

        return $this;
    }

    public function getRituel(): ?string
    {
        return $this->rituel;
    }

    public function setRituel(?string $rituel): self
    {
        $this->rituel = $rituel;

        return $this;
    }

    public function getRecette(): ?string
    {
        return $this->recette;
    }

    public function setRecette(?string $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function getBricolage(): ?string
    {
        return $this->bricolage;
    }

    public function setBricolage(?string $bricolage): self
    {
        $this->bricolage = $bricolage;

        return $this;
    }

    public function getOgham(): ?string
    {
        return $this->ogham;
    }

    public function setOgham(?string $ogham): self
    {
        $this->ogham = $ogham;

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

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(MagieVerteImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setMagieVerte($this);
        }

        return $this;
    }

    public function removeImage(MagieVerteImage $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getMagieVerte() === $this) {
                $image->setMagieVerte(null);
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

    public function addOption(MagieVerteOption $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setMagieVerte($this);
        }

        return $this;
    }

    public function removeOption(MagieVerteOption $option): self
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getMagieVerte() === $this) {
                $option->setMagieVerte(null);
            }
        }

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
            $comment->setMagieVerte($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getMagieVerte() === $this) {
                $comment->setMagieVerte(null);
            }
        }

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
