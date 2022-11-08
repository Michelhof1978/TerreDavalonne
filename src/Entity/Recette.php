<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: RecetteType::class, inversedBy: 'recettes')]
    private $typeRecette;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienPhoto;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $update_at;

    #[ORM\OneToMany(mappedBy: 'recette', targetEntity: RecetteImage::class, orphanRemoval: true, cascade: ['persist'])]
    private $images;

    #[ORM\OneToMany(mappedBy: 'recette', targetEntity: RecetteOption::class, cascade: ['persist'])]
    private $options;

    #[ORM\OneToMany(mappedBy: 'recette', targetEntity: Comment::class)]
    private $comments;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $imageHeader;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $videoHeader;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $presentation;

    public function __construct()
    {
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

    public function getTypeRecette(): ?RecetteType
    {
        return $this->typeRecette;
    }

    public function setTypeRecette(?RecetteType $typeRecette): self
    {
        $this->typeRecette = $typeRecette;

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

    public function getLienPhoto(): ?string
    {
        return $this->lienPhoto;
    }

    public function setLienPhoto(string $lienPhoto): self
    {
        $this->lienPhoto = $lienPhoto;

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
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(RecetteImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setRecette($this);
        }

        return $this;
    }

    public function removeImage(RecetteImage $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getRecette() === $this) {
                $image->setRecette(null);
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

    public function addOption(RecetteOption $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setRecette($this);
        }

        return $this;
    }

    public function removeOption(RecetteOption $option): self
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getRecette() === $this) {
                $option->setRecette(null);
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
            $comment->setRecette($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getRecette() === $this) {
                $comment->setRecette(null);
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
