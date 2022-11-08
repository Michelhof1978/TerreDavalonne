<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $Firstname;

    #[ORM\Column(type: 'string', length: 255)]
    private $lastname;

    #[ORM\Column(type: 'string')]
    private $birthday;

    #[ORM\Column(type: 'string', length: 255)]
    private $address;

    #[ORM\Column(type: 'integer')]
    private $zip;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    private $country;

    #[ORM\Column(type: 'string')]
    private $phone;

     /**
           @ORM\Column(name="createdAt", type="datetime", options={"default": "CURRENT_TIMESTAMP"})

         */
    private $createdAt;
 /**
       @ORM\Column(name="updatedAt", type="datetime", options={"default": "CURRENT_TIMESTAMP"})

     */
    private $updatedAt;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: GoldBook::class)]
    private $goldBooks;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: ReponseGoldBook::class)]
    private $reponseGoldBooks;

    #[ORM\Column(type: 'string', length: 255)]
    private $civility;

    #[ORM\ManyToOne(targetEntity: Profession::class, inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private $professionId;


    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commande::class, orphanRemoval: true)]
    private $commandes;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: CreneauCoatching::class)]
    private $creneauCoatchings;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Comment::class)]
    private $comments;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: ReponseComment::class)]
    private $reponseComments;


    public function __construct()
    {
        $this->goldBooks = new ArrayCollection();
        $this->reponseGoldBooks = new ArrayCollection();
        $this->commandes = new ArrayCollection();
        $this->creneauCoatchings = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->reponseComments = new ArrayCollection();
    }

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): self
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    public function setBirthday(string $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZip(): ?int
    {
        return $this->zip;
    }

    public function setZip(int $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, GoldBook>
     */
    public function getGoldBooks(): Collection
    {
        return $this->goldBooks;
    }

    public function addGoldBook(GoldBook $goldBook): self
    {
        if (!$this->goldBooks->contains($goldBook)) {
            $this->goldBooks[] = $goldBook;
            $goldBook->setUserId($this);
        }

        return $this;
    }

    public function removeGoldBook(GoldBook $goldBook): self
    {
        if ($this->goldBooks->removeElement($goldBook)) {
            // set the owning side to null (unless already changed)
            if ($goldBook->getUserId() === $this) {
                $goldBook->setUserId(null);
            }
        }

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection<int, ReponseGoldBook>
     */
    public function getReponseGoldBooks(): Collection
    {
        return $this->reponseGoldBooks;
    }

    public function addReponseGoldBook(ReponseGoldBook $reponseGoldBook): self
    {
        if (!$this->reponseGoldBooks->contains($reponseGoldBook)) {
            $this->reponseGoldBooks[] = $reponseGoldBook;
            $reponseGoldBook->setUserId($this);
        }

        return $this;
    }

    public function removeReponseGoldBook(ReponseGoldBook $reponseGoldBook): self
    {
        if ($this->reponseGoldBooks->removeElement($reponseGoldBook)) {
            // set the owning side to null (unless already changed)
            if ($reponseGoldBook->getUserId() === $this) {
                $reponseGoldBook->setUserId(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->email;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(string $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function getProfessionId(): ?Profession
    {
        return $this->professionId;
    }

    public function setProfessionId(?Profession $professionId): self
    {
        $this->professionId = $professionId;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUser() === $this) {
                $commande->setUser(null);
            }
        }

        return $this;
    }

    /*
     * @return Collection<int, CreneauCoatching>
     */
    public function getCreneauCoatchings(): Collection
    {
        return $this->creneauCoatchings;
    }

    public function addCreneauCoatching(CreneauCoatching $creneauCoatching): self
    {
        if (!$this->creneauCoatchings->contains($creneauCoatching)) {
            $this->creneauCoatchings[] = $creneauCoatching;
            $creneauCoatching->setUser($this);
        }

        return $this;
    }

    public function removeCreneauCoatching(CreneauCoatching $creneauCoatching): self
    {
        if ($this->creneauCoatchings->removeElement($creneauCoatching)) {
            // set the owning side to null (unless already changed)
            if ($creneauCoatching->getUser() === $this) {
                $creneauCoatching->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReponseComment>
     */
    public function getReponseComments(): Collection
    {
        return $this->reponseComments;
    }

    public function addReponseComment(ReponseComment $reponseComment): self
    {
        if (!$this->reponseComments->contains($reponseComment)) {
            $this->reponseComments[] = $reponseComment;
            $reponseComment->setUser($this);
        }

        return $this;
    }

    public function removeReponseComment(ReponseComment $reponseComment): self
    {
        if ($this->reponseComments->removeElement($reponseComment)) {
            // set the owning side to null (unless already changed)
            if ($reponseComment->getUser() === $this) {
                $reponseComment->setUser(null);
            }
        }

        return $this;
    }

    public function isIsVerified(): ?bool
    {
        return $this->isVerified;
    }
}
