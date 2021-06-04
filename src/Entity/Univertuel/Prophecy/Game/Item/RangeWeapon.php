<?php

namespace App\Entity\Univertuel\Prophecy\Game\Item;

use App\Repository\Univertuel\Prophecy\Game\Item\RangeWeaponRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Prophecy\Game\Item\WeaponCategory;

/**
 * @ORM\Entity(repositoryClass=RangeWeaponRepository::class)
 * @ORM\Table(name="prophecy_range_weapon")
 */
class RangeWeapon
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
     * @ORM\Column(type="integer")
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
     * @ORM\Column(type="array")
     */
    private $specialCapacities = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $weaponRange;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxRange;

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

    public function getStrengthConstraint(): ?int
    {
        return $this->strengthConstraint;
    }
    
    public function setStrengthConstraint(int $strengthConstraint): self
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

    public function setFlatDommages(int $flatDommages): self
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

    public function getSpecialCapacities(): ?array
    {
        return $this->specialCapacities;
    }

    public function setSpecialCapacities(array $specialCapacities): self
    {
        $this->specialCapacities = $specialCapacities;

        return $this;
    }

    public function getWeaponRange(): ?int
    {
        return $this->weaponRange;
    }

    public function setWeaponRange(int $weaponRange): self
    {
        $this->weaponRange = $weaponRange;

        return $this;
    }

    public function getMaxRange(): ?int
    {
        return $this->maxRange;
    }

    public function setMaxRange(int $maxRange): self
    {
        $this->maxRange = $maxRange;

        return $this;
    }
}
