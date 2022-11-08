<?php

namespace App\Entity;

use App\Repository\ReponseGoldBookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseGoldBookRepository::class)]
class ReponseGoldBook
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text', nullable: true)]
    private $reponse;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\OneToOne(inversedBy: 'reponseGoldBook', targetEntity: GoldBook::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $goldBookId;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reponseGoldBooks')]
    #[ORM\JoinColumn(nullable: false)]
    private $userId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): self
    {
        $this->reponse = $reponse;

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

    public function getGoldBookId(): ?GoldBook
    {
        return $this->goldBookId;
    }

    public function setGoldBookId(GoldBook $goldBookId): self
    {
        $this->goldBookId = $goldBookId;

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
}
