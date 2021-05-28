<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone_number2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail_contact2;

    /**
     * @ORM\Column(type="text")
     */
    private $social_objet;

    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $denomination;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sigle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_recepisse;

    /**
     * @ORM\Column(type="date")
     */
    private $date_creation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $site_internet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien_facebook;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    private $passwordConfirm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut_juridique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $province;

    /**
     * @ORM\Column(type="text")
     */
    private $description_activite;

    /**
     * @ORM\ManyToOne(targetEntity="GroupeActivite")
     */
    private $groupe_activite;

    /**
     * @ORM\ManyToOne(targetEntity=ThemeActivite::class,  inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    private $themeActivite;

    /**
     * @ORM\OneToMany(targetEntity=ReviewsArticle::class, mappedBy="user")
     */
    private $reviewsArticles;

   

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->reviewsArticles = new ArrayCollection();
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
    public function getUsername(): string
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
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getPhoneNumber2(): ?string
    {
        return $this->phone_number2;
    }

    public function setPhoneNumber2(string $phone_number2): self
    {
        $this->phone_number2 = $phone_number2;

        return $this;
    }

    public function getMailContact2(): ?string
    {
        return $this->mail_contact2;
    }

    public function setMailContact2(?string $mail_contact2): self
    {
        $this->mail_contact2 = $mail_contact2;

        return $this;
    }

    public function getSocialObjet(): ?string
    {
        return $this->social_objet;
    }

    public function setSocialObjet(string $social_objet): self
    {
        $this->social_objet = $social_objet;

        return $this;
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

    public function setSigle(?string $sigle): self
    {
        $this->sigle = $sigle;

        return $this;
    }

    public function getNumeroRecepisse(): ?string
    {
        return $this->numero_recepisse;
    }

    public function setNumeroRecepisse(string $numero_recepisse): self
    {
        $this->numero_recepisse = $numero_recepisse;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

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

    public function getPasswordConfirm(): ?string{
        return $this->passwordConfirm;
    }

    public function setPasswordConfirm(string $passwordConfirm){
        $this->passwordConfirm = $passwordConfirm;
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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

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

    public function getDescriptionActivite(): ?string
    {
        return $this->description_activite;
    }

    public function setDescriptionActivite(string $description_activite): self
    {
        $this->description_activite = $description_activite;

        return $this;
    }

    public function getGroupeActivite(): ?GroupeActivite
    {
        return $this->groupe_activite;
    }

    public function setGroupeActivite(GroupeActivite $groupe_activite): self
    {
        $this->groupe_activite = $groupe_activite;

        return $this;
    }

    public function getThemeActivite(): ?ThemeActivite
    {
        return $this->themeActivite;
    }

    public function setThemeActivite(?ThemeActivite $themeActivite): self
    {
        $this->themeActivite = $themeActivite;

        return $this;
    }

    /**
     * @return Collection|ReviewsArticle[]
     */
    public function getReviewsArticles(): Collection
    {
        return $this->reviewsArticles;
    }

    public function addReviewsArticle(ReviewsArticle $reviewsArticle): self
    {
        if (!$this->reviewsArticles->contains($reviewsArticle)) {
            $this->reviewsArticles[] = $reviewsArticle;
            $reviewsArticle->setUser($this);
        }

        return $this;
    }

    public function removeReviewsArticle(ReviewsArticle $reviewsArticle): self
    {
        if ($this->reviewsArticles->removeElement($reviewsArticle)) {
            // set the owning side to null (unless already changed)
            if ($reviewsArticle->getUser() === $this) {
                $reviewsArticle->setUser(null);
            }
        }

        return $this;
    }

    
}
