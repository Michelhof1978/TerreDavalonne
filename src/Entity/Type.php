<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Evenement::class)]
    private $evenements;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: FormationNumeric::class)]
    private $formationNumerics;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: CoachingVideo::class)]
    private $coachingVideos;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
        $this->formationNumerics = new ArrayCollection();
        $this->coachingVideos = new ArrayCollection();
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
     * @return Collection<int, Evenement>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->setType($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getType() === $this) {
                $evenement->setType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FormationNumeric>
     */
    public function getFormationNumerics(): Collection
    {
        return $this->formationNumerics;
    }

    public function addFormationNumeric(FormationNumeric $formationNumeric): self
    {
        if (!$this->formationNumerics->contains($formationNumeric)) {
            $this->formationNumerics[] = $formationNumeric;
            $formationNumeric->setType($this);
        }

        return $this;
    }

    public function removeFormationNumeric(FormationNumeric $formationNumeric): self
    {
        if ($this->formationNumerics->removeElement($formationNumeric)) {
            // set the owning side to null (unless already changed)
            if ($formationNumeric->getType() === $this) {
                $formationNumeric->setType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CoachingVideo>
     */
    public function getCoachingVideos(): Collection
    {
        return $this->coachingVideos;
    }

    public function addCoachingVideo(CoachingVideo $coachingVideo): self
    {
        if (!$this->coachingVideos->contains($coachingVideo)) {
            $this->coachingVideos[] = $coachingVideo;
            $coachingVideo->setType($this);
        }

        return $this;
    }

    public function removeCoachingVideo(CoachingVideo $coachingVideo): self
    {
        if ($this->coachingVideos->removeElement($coachingVideo)) {
            // set the owning side to null (unless already changed)
            if ($coachingVideo->getType() === $this) {
                $coachingVideo->setType(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
