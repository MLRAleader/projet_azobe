<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity=TagsArticle::class, mappedBy="article")
     */
    private $tagsArticles;

    /**
     * @ORM\OneToMany(targetEntity=RelatedArticle::class, mappedBy="article")
     */
    private $relatedArticles;

    /**
     * @ORM\OneToMany(targetEntity=ReviewsArticle::class, mappedBy="article")
     */
    private $reviewsArticles;

    public function __construct()
    {
        $this->tagsArticles = new ArrayCollection();
        $this->relatedArticles = new ArrayCollection();
        $this->reviewsArticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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

    /**
     * @return Collection|TagsArticle[]
     */
    public function getTagsArticles(): Collection
    {
        return $this->tagsArticles;
    }

    public function addTagsArticle(TagsArticle $tagsArticle): self
    {
        if (!$this->tagsArticles->contains($tagsArticle)) {
            $this->tagsArticles[] = $tagsArticle;
            $tagsArticle->addArticle($this);
        }

        return $this;
    }

    public function removeTagsArticle(TagsArticle $tagsArticle): self
    {
        if ($this->tagsArticles->removeElement($tagsArticle)) {
            $tagsArticle->removeArticle($this);
        }

        return $this;
    }

    /**
     * @return Collection|RelatedArticle[]
     */
    public function getRelatedArticles(): Collection
    {
        return $this->relatedArticles;
    }

    public function addRelatedArticle(RelatedArticle $relatedArticle): self
    {
        if (!$this->relatedArticles->contains($relatedArticle)) {
            $this->relatedArticles[] = $relatedArticle;
            $relatedArticle->setArticle($this);
        }

        return $this;
    }

    public function removeRelatedArticle(RelatedArticle $relatedArticle): self
    {
        if ($this->relatedArticles->removeElement($relatedArticle)) {
            // set the owning side to null (unless already changed)
            if ($relatedArticle->getArticle() === $this) {
                $relatedArticle->setArticle(null);
            }
        }

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
            $reviewsArticle->setArticle($this);
        }

        return $this;
    }

    public function removeReviewsArticle(ReviewsArticle $reviewsArticle): self
    {
        if ($this->reviewsArticles->removeElement($reviewsArticle)) {
            // set the owning side to null (unless already changed)
            if ($reviewsArticle->getArticle() === $this) {
                $reviewsArticle->setArticle(null);
            }
        }

        return $this;
    }
}
