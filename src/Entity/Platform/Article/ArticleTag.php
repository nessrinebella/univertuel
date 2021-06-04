<?php

namespace App\Entity\Platform\Article;

use App\Repository\Platform\article\ArticleTagRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=ArticleTagRepository::class)
 */
class ArticleTag
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
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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
    
    public function getArticles(): ?Collection
    {
        return $this->articles;
    }
    
    /**
     * @param mixed $articles
     */
    public function setArticles($articles): self
    {
        $this->articles = $articles;
        
        return $this;
    }
    
    public function removeArticle (Article $article): self
    {
        if($this->articles->contains($article))
        {
            $this->articles->removeElement($article);
        }
        
        return $this;
    }
    
}
