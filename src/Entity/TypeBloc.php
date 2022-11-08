<?php

namespace App\Entity;

use App\Repository\TypeBlocRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeBlocRepository::class)]
class TypeBloc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $typeName;

    #[ORM\OneToMany(mappedBy: 'typeBloc', targetEntity: BlocContent::class)]
    private $blocContents;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $radius;

    public function __construct()
    {
        $this->blocContents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeName(): ?string
    {
        return $this->typeName;
    }

    public function setTypeName(string $typeName): self
    {
        $this->typeName = $typeName;

        return $this;
    }

    /**
     * @return Collection<int, BlocContent>
     */
    public function getBlocContents(): Collection
    {
        return $this->blocContents;
    }

    public function addBlocContent(BlocContent $blocContent): self
    {
        if (!$this->blocContents->contains($blocContent)) {
            $this->blocContents[] = $blocContent;
            $blocContent->setTypeBloc($this);
        }

        return $this;
    }

    public function removeBlocContent(BlocContent $blocContent): self
    {
        if ($this->blocContents->removeElement($blocContent)) {
            // set the owning side to null (unless already changed)
            if ($blocContent->getTypeBloc() === $this) {
                $blocContent->setTypeBloc(null);
            }
        }

        return $this;
    }

    public function getRadius(): ?int
    {
        return $this->radius;
    }

    public function setRadius(?int $radius): self
    {
        $this->radius = $radius;

        return $this;
    }

    public function __toString()
    {
        return $this->typeName;
    }
}
