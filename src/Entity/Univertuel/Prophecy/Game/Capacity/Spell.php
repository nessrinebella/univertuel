<?php

namespace App\Entity\Univertuel\Prophecy\Game\Capacity;

use App\Repository\Univertuel\Prophecy\Game\Capacity\SpellRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpellRepository::class)
 * @ORM\Table(name="prophecy_spell")
 */
class Spell
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Capacity\MagicDomain")
     */
    private $magicDomain;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Capacity\Discipline")
     */
    private $discipline;

    /**
     * @ORM\Column(type="integer")
     */
    private $manaCost;

    /**
     * @ORM\Column(type="integer")
     */
    private $difficulty;

    /**
     * @ORM\Column(type="text")
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $spellKeys;

    /**
     * @ORM\Column(type="text")
     */
    private $effect;


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

    public function getMagicDomain(): ?int
    {
        return $this->magicDomain;
    }

    public function setMagicDomain(int $magicDomain): self
    {
        $this->magicDomain = $magicDomain;

        return $this;
    }

    public function getDiscipline(): ?int
    {
        return $this->discipline;
    }

    public function setDiscipline(int $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }

    public function getManaCost(): ?int
    {
        return $this->manaCost;
    }

    public function setManaCost(int $manaCost): self
    {
        $this->manaCost = $manaCost;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getSpellKeys(): ?string
    {
        return $this->spellKeys;
    }

    public function setSpellKeys(string $spellKeys): self
    {
        $this->spellKeys = $spellKeys;

        return $this;
    }

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(string $effect): self
    {
        $this->effect = $effect;

        return $this;
    }
    
}
