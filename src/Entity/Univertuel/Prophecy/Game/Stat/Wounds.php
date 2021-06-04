<?php

namespace App\Entity\Univertuel\Prophecy\Game\Stat;

use App\Repository\Univertuel\Prophecy\Game\Stat\WoundsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Game\Game;

/**
 * @ORM\Entity(repositoryClass=WoundsRepository::class)
 * @ORM\Table(name="prophecy_wounds")
 */
class Wounds
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
    private $malus;

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

    public function getMalus(): ?int
    {
        return $this->malus;
    }

    public function setMalus(int $malus): self
    {
        $this->malus = $malus;

        return $this;
    }
}
