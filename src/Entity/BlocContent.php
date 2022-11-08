<?php

namespace App\Entity;

use App\Repository\BlocContentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlocContentRepository::class)]
class BlocContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable:false)]
    private $title;

    #[ORM\Column(type: 'string', length: 255, nullable:true)]
    private $lienImage;

    #[ORM\Column(type: 'string', length: 255, nullable:true)]
    private $lienVideo;

    #[ORM\Column(type: 'text', nullable: true)]
    private $text;

    #[ORM\ManyToOne(targetEntity: TypeBloc::class, inversedBy: 'blocContents')]
    #[ORM\JoinColumn(nullable: false)]
    private $typeBloc;

    #[ORM\OneToMany(mappedBy: 'blocContentId', targetEntity: BlocContentAttachement::class)]
    private $blocContentAttachements;

    #[ORM\OneToOne(inversedBy: 'blocContent', targetEntity: Section::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $sectionId;

    public function __construct()
    {
        $this->blocContentAttachements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLienImage(): ?string
    {
        return $this->lienImage;
    }

    public function setLienImage(?string $lienImage): self
    {
        $this->lienImage = $lienImage;

        return $this;
    }

    public function getLienVideo(): ?string
    {
        return $this->lienVideo;
    }

    public function setLienVideo(?string $lienVideo): self
    {
        $this->lienVideo = $lienVideo;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getTypeBloc(): ?TypeBloc
    {
        return $this->typeBloc;
    }

    public function setTypeBloc(?TypeBloc $typeBloc): self
    {
        $this->typeBloc = $typeBloc;

        return $this;
    }

    /**
     * @return Collection<int, BlocContentAttachement>
     */
    public function getBlocContentAttachements(): Collection
    {
        return $this->blocContentAttachements;
    }

    public function addBlocContentAttachement(BlocContentAttachement $blocContentAttachement): self
    {
        if (!$this->blocContentAttachements->contains($blocContentAttachement)) {
            $this->blocContentAttachements[] = $blocContentAttachement;
            $blocContentAttachement->setBlocContentId($this);
        }

        return $this;
    }

    public function removeBlocContentAttachement(BlocContentAttachement $blocContentAttachement): self
    {
        if ($this->blocContentAttachements->removeElement($blocContentAttachement)) {
            // set the owning side to null (unless already changed)
            if ($blocContentAttachement->getBlocContentId() === $this) {
                $blocContentAttachement->setBlocContentId(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->title;
    }

    public function getSectionId(): ?Section
    {
        return $this->sectionId;
    }

    public function setSectionId(Section $sectionId): self
    {
        $this->sectionId = $sectionId;

        return $this;
    }
}
