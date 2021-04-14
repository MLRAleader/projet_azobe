<?php

namespace App\Entity;

use App\Repository\GroupeActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupeActiviteRepository::class)
 */
class GroupeActivite
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
     * @ORM\OneToMany(targetEntity=ThemeActivite::class, mappedBy="groupeActivite")
     */
    private $themeActivites;

    

    public function __construct()
    {
        $this->themeActivites = new ArrayCollection();
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

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|ThemeActivite[]
     */
    public function getThemeActivites(): Collection
    {
        return $this->themeActivites;
    }

    public function addThemeActivite(ThemeActivite $themeActivite): self
    {
        if (!$this->themeActivites->contains($themeActivite)) {
            $this->themeActivites[] = $themeActivite;
            $themeActivite->setGroupeActivite($this);
        }

        return $this;
    }

    public function removeThemeActivite(ThemeActivite $themeActivite): self
    {
        if ($this->themeActivites->removeElement($themeActivite)) {
            // set the owning side to null (unless already changed)
            if ($themeActivite->getGroupeActivite() === $this) {
                $themeActivite->setGroupeActivite(null);
            }
        }

        return $this;
    }

    
}
