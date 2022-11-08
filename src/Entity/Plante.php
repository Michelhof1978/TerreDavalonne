<?php

namespace App\Entity;

use App\Repository\PlanteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanteRepository::class)]
class Plante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienVideo;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $update_at;

    #[ORM\Column(type: 'string', length: 255)]
    private $latinName;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\ManyToMany(targetEntity: ElementBase::class, inversedBy: 'plantes')]
    private $elementBases;

    #[ORM\ManyToMany(targetEntity: ElementPhyto::class, inversedBy: 'plantes')]
    private $elementPhytos;

    #[ORM\ManyToMany(targetEntity: ElementSabbat::class, inversedBy: 'plantes')]
    private $elementSabbats;

    #[ORM\OneToMany(mappedBy: 'plante', targetEntity: Comment::class)]
    private $comments;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $imageHeader;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $videoHeader;

    #[ORM\OneToMany(mappedBy: 'plante', targetEntity: PlanteImage::class, orphanRemoval: true, cascade: ['persist'])]
    private $images;

    #[ORM\OneToMany(mappedBy: 'plante', targetEntity: PlanteOption::class, cascade: ['persist'])]
    private $options;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $presentation;

    public function __construct()
    {
        $this->elementBases = new ArrayCollection();
        $this->elementPhytos = new ArrayCollection();
        $this->elementSabbats = new ArrayCollection();
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

    public function getLienVideo(): ?string
    {
        return $this->lienVideo;
    }

    public function setLienVideo(string $lienVideo): self
    {
        $this->lienVideo = $lienVideo;

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

    public function getLatinName(): ?string
    {
        return $this->latinName;
    }

    public function setLatinName(string $latinName): self
    {
        $this->latinName = $latinName;

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
     * @return Collection<int, ElementBase>
     */
    public function getElementBases(): Collection
    {
        return $this->elementBases;
    }

    public function addElementBases(ElementBase $elementBases): self
    {
        if (!$this->elementBases->contains($elementBases)) {
            $this->elementBases[] = $elementBases;
        }

        return $this;
    }

    public function removeElementBases(ElementBase $elementBases): self
    {
        $this->elementBases->removeElement($elementBases);

        return $this;
    }

    /**
     * @return Collection<int, ElementPhyto>
     */
    public function getElementPhytos(): Collection
    {
        return $this->elementPhytos;
    }

    public function addElementPhyto(ElementPhyto $elementPhyto): self
    {
        if (!$this->elementPhytos->contains($elementPhyto)) {
            $this->elementPhytos[] = $elementPhyto;
        }

        return $this;
    }

    public function removeElementPhyto(ElementPhyto $elementPhyto): self
    {
        $this->elementPhytos->removeElement($elementPhyto);

        return $this;
    }

    /**
     * @return Collection<int, ElementSabbat>
     */
    public function getElementSabbats(): Collection
    {
        return $this->elementSabbats;
    }

    public function addElementSabbat(ElementSabbat $elementSabbat): self
    {
        if (!$this->elementSabbats->contains($elementSabbat)) {
            $this->elementSabbats[] = $elementSabbat;
        }

        return $this;
    }

    public function removeElementSabbat(ElementSabbat $elementSabbat): self
    {
        $this->elementSabbats->removeElement($elementSabbat);

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
            $comment->setPlante($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getPlante() === $this) {
                $comment->setPlante(null);
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

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(PlanteImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setPlante($this);
        }

        return $this;
    }

    public function removeImage(PlanteImage $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getPlante() === $this) {
                $image->setPlante(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(PlanteOption $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setPlante($this);
        }

        return $this;
    }

    public function removeOption(PlanteOption $option): self
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getPlante() === $this) {
                $option->setPlante(null);
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
