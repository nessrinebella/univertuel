<?php

namespace App\Entity\Univertuel\Prophecy\Game\Stat;

use App\Repository\Univertuel\Prophecy\Game\Stat\OmenRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Game\Game;

/**
 * @ORM\Entity(repositoryClass=OmenRepository::class)
 * @ORM\Table(name="prophecy_omen")
 */
class Omen
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
}
