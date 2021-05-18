<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActiviteRepository::class)
 */
class Activite
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
     * @ORM\ManyToOne(targetEntity=ThemeActivite::class, inversedBy="activites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $themeActivite;

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

    public function getThemeActivite(): ?ThemeActivite
    {
        return $this->themeActivite;
    }

    public function setThemeActivite(?ThemeActivite $themeActivite): self
    {
        $this->themeActivite = $themeActivite;

        return $this;
    }
}
