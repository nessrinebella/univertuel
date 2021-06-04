<?php

namespace App\Entity\Univertuel\Prophecy\Game\Item;

use App\Repository\Univertuel\Prophecy\Game\Item\HastWeaponRepository;
use App\Entity\Univertuel\Prophecy\Game\Item\WeaponCategory;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HastWeaponRepository::class)
 * @ORM\Table(name="prophecy_hast_weapon")
 */
class HastWeapon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Item\WeaponCategory")
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     */
    private $meleeInitiative;

    /**
     * @ORM\Column(type="integer")
     */
    private $combatInitiative;

    /**
     * @ORM\Column(type="integer")
     */
    private $strengthConstraint;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $coordinationConstraint;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $perceptionConstraint;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $flatDommages;

    /**
     * @ORM\Column(type="integer")
     */
    private $strengthDommages;

    /**
     * @ORM\Column(type="integer")
     */
    private $multiple;

    /**
     * @ORM\Column(type="integer")
     */
    private $specialCapacities;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?WeaponCategory
    {
        return $this->category;
    }

    public function setCategory(WeaponCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getMeleeInitiative(): ?int
    {
        return $this->meleeInitiative;
    }

    public function setMeleeInitiative(int $meleeInitiative): self
    {
        $this->meleeInitiative = $meleeInitiative;

        return $this;
    }

    public function getCombatInitiative(): ?int
    {
        return $this->combatInitiative;
    }

    public function setCombatInitiative(int $combatInitiative): self
    {
        $this->combatInitiative = $combatInitiative;

        return $this;
    }

    public function getStrenghtConstraint(): ?int
    {
        return $this->strengthConstraint;
    }
    
    public function setStrenghtConstraint(int $strengthConstraint): self
    {
        $this->strengthConstraint = $strengthConstraint;
        
        return $this;
    }
    
    public function getCoordinationConstraint(): ?int
    {
        return $this->coordinationConstraint;
    }
    
    public function setCoordinationConstraint(int $coordinationConstraint): self
    {
        $this->coordinationConstraint;
        
        return $this;
    }
    
    public function getPerceptionConstraint(): ?int
    {
        return $this->perceptionConstraint;
    }
    
    public function setPerceptionConstraint(int $perceptionConstraint): self
    {
        $this->perceptionConstraint;
        
        return $this;
    }

    public function getFlatDommages(): ?int
    {
        return $this->flatDommages;
    }

    public function setFlatDommages(?int $flatDommages): self
    {
        $this->flatDommages = $flatDommages;

        return $this;
    }

    public function getStrengthDommages(): ?int
    {
        return $this->strengthDommages;
    }

    public function setStrengthDommages(int $strengthDommages): self
    {
        $this->strengthDommages = $strengthDommages;

        return $this;
    }

    public function getMultiple(): ?int
    {
        return $this->multiple;
    }

    public function setMultiple(int $multiple): self
    {
        $this->multiple = $multiple;

        return $this;
    }

    public function getSpecialCapacities(): ?int
    {
        return $this->specialCapacities;
    }

    public function setSpecialCapacities(int $specialCapacities): self
    {
        $this->specialCapacities = $specialCapacities;

        return $this;
    }
}
