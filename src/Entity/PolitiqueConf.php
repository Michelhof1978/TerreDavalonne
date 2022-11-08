<?php

namespace App\Entity;

use App\Repository\PolitiqueConfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolitiqueConfRepository::class)]
class PolitiqueConf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $description;

    public function getId(): ?int
    {
        return $this->id;
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
}
