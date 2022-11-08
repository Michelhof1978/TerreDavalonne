<?php

namespace App\Entity;

use App\Repository\GoldBookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GoldBookRepository::class)]
class GoldBook
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $comment;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'goldBooks')]
    #[ORM\JoinColumn(nullable: false)]
    private $userId;

    #[ORM\Column(type: 'boolean')]
    private $isValid;

    #[ORM\OneToOne(mappedBy: 'goldBookId', targetEntity: ReponseGoldBook::class, cascade: ['persist', 'remove'])]
    private $reponseGoldBook;

    public function __construct()
    {
        $this->created_at  = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getIsValid(): ?bool
    {
        return $this->isValid;
    }

    public function setIsValid(bool $isValid): self
    {
        $this->isValid = $isValid;

        return $this;
    }

    public function getReponseGoldBook(): ?ReponseGoldBook
    {
        return $this->reponseGoldBook;
    }

    public function setReponseGoldBook(ReponseGoldBook $reponseGoldBook): self
    {
        // set the owning side of the relation if necessary
        if ($reponseGoldBook->getGoldBookId() !== $this) {
            $reponseGoldBook->setGoldBookId($this);
        }

        $this->reponseGoldBook = $reponseGoldBook;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }

    public function isIsValid(): ?bool
    {
        return $this->isValid;
    }
}
