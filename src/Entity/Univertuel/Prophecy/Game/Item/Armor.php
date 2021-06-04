<?php

namespace App\Entity\Univertuel\Prophecy\Game\Item;

use App\Repository\Univertuel\Prophecy\Game\Item\ArmorRepository;
use App\Entity\Univertuel\Prophecy\Game\Item\ArmorCategory;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmorRepository::class)
 * @ORM\Table(name="prophecy_armor")
 */
class Armor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $protection;

    /**
     * @ORM\Column(type="integer")
     */
    private $strengthConstraint;

    /**
     * @ORM\Column(type="integer")
     */
    private $resistConstraint;

    /**
     * @ORM\Column(type="integer")
     * encombrement
     */
    private $boundary;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Item\ArmorCategory")
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProtection(): ?int
    {
        return $this->protection;
    }

    public function setProtection(int $protection): self
    {
        $this->protection = $protection;

        return $this;
    }

    public function getStrengthConstraint()
    {
        return $this->strengthConstraint;
    }
    
    public function getResistConstraint()
    {
        return $this->resistConstraint;
    }
    
    public function setStrengthConstraint($strengthConstraint)
    {
        $this->strengthConstraint = $strengthConstraint;
    }
    
    public function setResistConstraint($resistConstraint)
    {
        $this->resistConstraint = $resistConstraint;
    }

    public function getBoundary(): ?int
    {
        return $this->boundary;
    }

    public function setBoundary(int $boundary): self
    {
        $this->boundary = $boundary;

        return $this;
    }

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function setCategory(int $category): self
    {
        $this->category = $category;

        return $this;
    }
}
