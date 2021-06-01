<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppelsRepository::class)
 */
class Appels
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
     * @ORM\OneToMany(targetEntity=AppelOffre::class, mappedBy="appels")
     */
    private $AppelOffre;

    public function __construct()
    {
        $this->AppelOffre = new ArrayCollection();
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
     * @return Collection|AppelOffre[]
     */
    public function getAppelOffre(): Collection
    {
        return $this->AppelOffre;
    }

    public function addAppelOffre(AppelOffre $appelOffre): self
    {
        if (!$this->AppelOffre->contains($appelOffre)) {
            $this->AppelOffre[] = $appelOffre;
            $appelOffre->setAppels($this);
        }

        return $this;
    }

    public function removeAppelOffre(AppelOffre $appelOffre): self
    {
        if ($this->AppelOffre->removeElement($appelOffre)) {
            // set the owning side to null (unless already changed)
            if ($appelOffre->getAppels() === $this) {
                $appelOffre->setAppels(null);
            }
        }

        return $this;
    }


    public function __toString()
    {
       return $this->name;
    }
}
