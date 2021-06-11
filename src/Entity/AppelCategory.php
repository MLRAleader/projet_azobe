<?php

namespace App\Entity;

use App\Repository\AppelCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppelCategoryRepository::class)
 */
class AppelCategory
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
     * @ORM\ManyToMany(targetEntity=Appel::class, mappedBy="category_appel")
     */
    private $appels;

 

  

    public function __construct()
    {
        $this->appels = new ArrayCollection();
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
     * @return Collection|Appel[]
     */
    public function getAppels(): Collection
    {
        return $this->appels;
    }
    
    public function __toString()
    {
        return $this->name;
    }

    public function addAppel(Appel $appel): self
    {
        if (!$this->appels->contains($appel)) {
            $this->appels[] = $appel;
            $appel->addCategoryAppel($this);
        }

        return $this;
    }

    public function removeAppel(Appel $appel): self
    {
        if ($this->appels->removeElement($appel)) {
            $appel->removeCategoryAppel($this);
        }

        return $this;
    }

}
