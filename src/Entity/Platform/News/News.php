<?php

namespace App\Entity\Platform\News;

use App\Repository\Platform\News\NewsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 */
class News
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Many news have many tags.
     * @ORM\ManyToMany(targetEntity="App\Entity\Platform\News\NewsTag")
     */
    private $tags=[];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isOnTop;
    
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

    public function getAuthor(): ?int
    {
        return $this->author;
    }

    public function setAuthor(int $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getDateCreation(): ?string
    {
        return date_format($this->dateCreation,"D j F YYYY à H:i:s");
    }
    
    public function setDateCreation($dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getIsOnTop(): ?bool
    {
        return $this->isOnTop;
    }

    public function setIsOnTop(bool $isOnTop): self
    {
        $this->isOnTop = $isOnTop;

        return $this;
    }
    
    public function addTag(NewsTag $tag): self
    {
        if(!($this->tags->contains($tag)))
        {
            $this->tags->add($tag);
        }
        
        return $this;
    }
    
    public function removeTag(NewsTag $tag): self
    {
        if($this->tags->contains($tag))
        {
            $this->tags->removeElement($tag);
        }
        
        return $this;
    }
}
