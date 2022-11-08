<?php

namespace App\Entity;

use App\Repository\TypeOptionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeOptionsRepository::class)]
class TypeOptions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: PlanteOption::class)]
    private $options;

    public function __construct()
    {
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
            $option->setType($this);
        }

        return $this;
    }

    public function removeOption(PlanteOption $option): self
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getType() === $this) {
                $option->setType(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
