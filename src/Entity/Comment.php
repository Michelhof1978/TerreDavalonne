<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'text')]
    private $comment;

    #[ORM\Column(type: 'boolean')]
    private $isValid;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\OneToOne(mappedBy: 'comment', targetEntity: ReponseComment::class, cascade: ['persist', 'remove'])]
    private $reponseComment;

    #[ORM\ManyToOne(targetEntity: Plante::class, inversedBy: 'comments')]
    private $plante;

    #[ORM\ManyToOne(targetEntity: MagieVerte::class, inversedBy: 'comments')]
    private $magieVerte;

    #[ORM\ManyToOne(targetEntity: Recette::class, inversedBy: 'comments')]
    private $recette;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'comments')]
    private $product;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function isIsValid(): ?bool
    {
        return $this->isValid;
    }

    public function setIsValid(bool $isValid): self
    {
        $this->isValid = $isValid;

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

    public function getReponseComment(): ?ReponseComment
    {
        return $this->reponseComment;
    }

    public function setReponseComment(ReponseComment $reponseComment): self
    {
        // set the owning side of the relation if necessary
        if ($reponseComment->getComment() !== $this) {
            $reponseComment->setComment($this);
        }

        $this->reponseComment = $reponseComment;

        return $this;
    }

    public function getPlante(): ?Plante
    {
        return $this->plante;
    }

    public function setPlante(?Plante $plante): self
    {
        $this->plante = $plante;

        return $this;
    }

    public function getMagieVerte(): ?MagieVerte
    {
        return $this->magieVerte;
    }

    public function setMagieVerte(?MagieVerte $magieVerte): self
    {
        $this->magieVerte = $magieVerte;

        return $this;
    }

    public function getRecette(): ?Recette
    {
        return $this->recette;
    }

    public function setRecette(?Recette $recette): self
    {
        $this->recette = $recette;

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
}
