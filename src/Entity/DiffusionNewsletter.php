<?php

namespace App\Entity;

use App\Repository\DiffusionNewsletterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiffusionNewsletterRepository::class)]
class DiffusionNewsletter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $email;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'boolean')]
    private $is_rgpd;

    #[ORM\Column(type: 'string', length: 255)]
    private $validation_token;

    #[ORM\Column(type: 'boolean')]
    private $is_valid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getIsRgpd(): ?bool
    {
        return $this->is_rgpd;
    }

    public function setIsRgpd(bool $is_rgpd): self
    {
        $this->is_rgpd = $is_rgpd;

        return $this;
    }

    public function getValidationToken(): ?string
    {
        return $this->validation_token;
    }

    public function setValidationToken(string $validation_token): self
    {
        $this->validation_token = $validation_token;

        return $this;
    }

    public function getIsValid(): ?bool
    {
        return $this->is_valid;
    }

    public function setIsValid(bool $is_valid): self
    {
        $this->is_valid = $is_valid;

        return $this;
    }

    public function isIsRgpd(): ?bool
    {
        return $this->is_rgpd;
    }

    public function isIsValid(): ?bool
    {
        return $this->is_valid;
    }
}
