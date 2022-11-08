<?php

namespace App\Entity;

use App\Repository\ParametersGenerauxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParametersGenerauxRepository::class)]
class ParametersGeneraux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $siteName;

    #[ORM\Column(type: 'string', length: 255)]
    private $logo;

    #[ORM\Column(type: 'string', length: 255)]
    private $adress;

    #[ORM\Column(type: 'string', length: 5)]
    private $zip;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    private $phoneNumber;

    #[ORM\Column(type: 'string', length: 255)]
    private $emailContact;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lienYoutube;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lienInstagram;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lienMeta;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lienTiktok;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiteName(): ?string
    {
        return $this->siteName;
    }

    public function setSiteName(string $siteName): self
    {
        $this->siteName = $siteName;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
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

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getLienYoutube(): ?string
    {
        return $this->lienYoutube;
    }

    public function setLienYoutube(?string $lienYoutube): self
    {
        $this->lienYoutube = $lienYoutube;

        return $this;
    }

    public function getLienInstagram(): ?string
    {
        return $this->lienInstagram;
    }

    public function setLienInstagram(?string $lienInstagram): self
    {
        $this->lienInstagram = $lienInstagram;

        return $this;
    }

    public function getLienMeta(): ?string
    {
        return $this->lienMeta;
    }

    public function setLienMeta(?string $lienMeta): self
    {
        $this->lienMeta = $lienMeta;

        return $this;
    }

    public function getLienTiktok(): ?string
    {
        return $this->lienTiktok;
    }

    public function setLienTiktok(?string $lienTiktok): self
    {
        $this->lienTiktok = $lienTiktok;

        return $this;
    }
}
