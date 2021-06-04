<?php

namespace App\Entity\Univertuel\Prophecy\Game\Stat;

use App\Repository\Univertuel\Prophecy\Game\Stat\MagicManaRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Game\Game;

/**
 * @ORM\Entity(repositoryClass=MagicManaRepository::class)
 * @ORM\Table(name="prophecy_magic_mana")
 */
class MagicMana
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

    /**
     * @ORM\Column(type="integer")
     */
    private $maxVal;

    /**
     * @ORM\Column(type="integer")
     */
    private $upgradeCost;
    
    
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

    public function getMaxVal(): ?int
    {
        return $this->maxVal;
    }

    public function setMaxVal(int $maxVal): self
    {
        $this->maxVal = $maxVal;

        return $this;
    }

    public function getUpgradeCost(): ?int
    {
        return $this->upgradeCost;
    }

    public function setUpgradeCost(int $upgradeCost): self
    {
        $this->upgradeCost = $upgradeCost;

        return $this;
    }
}
