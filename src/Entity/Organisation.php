<?php

namespace App\Entity;

use App\Repository\OrganisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganisationRepository::class)
 */
class Organisation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $denomination;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sigle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut_juridique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="date")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_recepicee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $province;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objet_social;

    /**
     * @ORM\Column(type="text")
     */
    private $description_activite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $site_internet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien_facebook;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero_telephone2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email_organisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_telephone1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDenomination(): ?string
    {
        return $this->denomination;
    }

    public function setDenomination(string $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }

    public function getSigle(): ?string
    {
        return $this->sigle;
    }

    public function setSigle(string $sigle): self
    {
        $this->sigle = $sigle;

        return $this;
    }

    public function getStatutJuridique(): ?string
    {
        return $this->statut_juridique;
    }

    public function setStatutJuridique(string $statut_juridique): self
    {
        $this->statut_juridique = $statut_juridique;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getNumeroRecepicee(): ?string
    {
        return $this->numero_recepicee;
    }

    public function setNumeroRecepicee(string $numero_recepicee): self
    {
        $this->numero_recepicee = $numero_recepicee;

        return $this;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(string $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getObjetSocial(): ?string
    {
        return $this->objet_social;
    }

    public function setObjetSocial(string $objet_social): self
    {
        $this->objet_social = $objet_social;

        return $this;
    }

    public function getDescriptionActivite(): ?string
    {
        return $this->description_activite;
    }

    public function setDescriptionActivite(string $description_activite): self
    {
        $this->description_activite = $description_activite;

        return $this;
    }

    public function getSiteInternet(): ?string
    {
        return $this->site_internet;
    }

    public function setSiteInternet(?string $site_internet): self
    {
        $this->site_internet = $site_internet;

        return $this;
    }

    public function getLienFacebook(): ?string
    {
        return $this->lien_facebook;
    }

    public function setLienFacebook(?string $lien_facebook): self
    {
        $this->lien_facebook = $lien_facebook;

        return $this;
    }

    public function getNumeroTelephone2(): ?string
    {
        return $this->numero_telephone2;
    }

    public function setNumeroTelephone2(?string $numero_telephone2): self
    {
        $this->numero_telephone2 = $numero_telephone2;

        return $this;
    }

    public function getEmailOrganisation(): ?string
    {
        return $this->email_organisation;
    }

    public function setEmailOrganisation(?string $email_organisation): self
    {
        $this->email_organisation = $email_organisation;

        return $this;
    }

    public function getNumeroTelephone1(): ?string
    {
        return $this->numero_telephone1;
    }

    public function setNumeroTelephone1(string $numero_telephone1): self
    {
        $this->numero_telephone1 = $numero_telephone1;

        return $this;
    }
}
