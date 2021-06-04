<?php

namespace App\Entity\Platform\Article;

use App\Repository\Platform\Article\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\User\User;
use Doctrine\Common\Collections\Collection;

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
     * Many articles have many tags.
     * @ORM\ManyToMany(targetEntity="App\Entity\Platform\Article\ArticleTag")
     */
    private $tags = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished;
    
    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTags(): ?Collection
    {
        return $this->tags;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
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

    public function getDateCreation(): ?string
    {
        return date_format($this->dateCreation, "D j F YYYY à H:i:s");
    }
    
    public function setDateCreation($dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }
    
    public function addTag (ArticleTag $tag): self
    {
        //if tag is not in $this->tags
        if (!($this->tags->contains($tag)))
        {
            $this->tags->add($tag);
        }
        
        return $this;
    }
    
    public function removeTag(ArticleTag $tag): self
    {
        if($this->tags->contains($tag))
        {
            $this->tags->remove($tag);
        }
        
        return $this;
    }
}
