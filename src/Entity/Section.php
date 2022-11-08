<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Page::class, inversedBy: 'sections')]
    #[ORM\JoinColumn(nullable: false)]
    private $pageId;

    #[ORM\OneToOne(mappedBy: 'sectionId', targetEntity: BlocContent::class, cascade: ['persist', 'remove'])]
    private $blocContent;

    #[ORM\Column(type: 'string', length: 255)]
    #[ORM\JoinColumn(nullable: true)]
    private $slug;

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

    public function getPageId(): ?Page
    {
        return $this->pageId;
    }

    public function setPageId(?Page $pageId): self
    {
        $this->pageId = $pageId;

        return $this;
    }

    public function getBlocContent(): ?BlocContent
    {
        return $this->blocContent;
    }

    public function setBlocContent(BlocContent $blocContent): self
    {
        // set the owning side of the relation if necessary
        if ($blocContent->getSectionId() !== $this) {
            $blocContent->setSectionId($this);
        }

        $this->blocContent = $blocContent;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
