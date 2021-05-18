<?php

namespace App\Entity;

use App\Repository\ThemeActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThemeActiviteRepository::class)
 */
class ThemeActivite
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
    private $name;

   

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="themeActivite")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=GroupeActivite::class, inversedBy="themeActivites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $groupeActivite;

    /**
     * @ORM\OneToMany(targetEntity=Activite::class, mappedBy="themeActivite")
     */
    private $activites;

   

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->activites = new ArrayCollection();
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
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setThemeActivite($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getThemeActivite() === $this) {
                $user->setThemeActivite(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getGroupeActivite(): ?GroupeActivite
    {
        return $this->groupeActivite;
    }

    public function setGroupeActivite(?GroupeActivite $groupeActivite): self
    {
        $this->groupeActivite = $groupeActivite;

        return $this;
    }

    /**
     * @return Collection|Activite[]
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activite $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites[] = $activite;
            $activite->setThemeActivite($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        if ($this->activites->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getThemeActivite() === $this) {
                $activite->setThemeActivite(null);
            }
        }

        return $this;
    }
    
}
