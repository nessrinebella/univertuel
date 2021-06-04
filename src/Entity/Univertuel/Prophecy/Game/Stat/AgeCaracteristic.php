<?php

namespace App\Entity\Univertuel\Prophecy\Game\Stat;

use App\Repository\Univertuel\Prophecy\Game\Stat\AgeCaracteristicRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Prophecy\Game\Stat\Age;
use App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic;

/**
 * @ORM\Entity(repositoryClass=AgeCaracteristicRepository::class)
 * @ORM\Table(name="prophecy_age_caracteristic")
 */
class AgeCaracteristic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Stat\Age")
     */
    private $age;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic")
     */
    private $caracteristic;

    /**
     * @ORM\Column(type="integer")
     */
    private $modification;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAge(): ?Age
    {
        return $this->age;
    }

    public function setAge(Age $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getCaracteristic(): ?Caracteristic
    {
        return $this->caracteristic;
    }

    public function setCaracteristic(Caracteristic $caracteristic): self
    {
        $this->caracteristic = $caracteristic;

        return $this;
    }

    public function getModification(): ?int
    {
        return $this->modification;
    }

    public function setModification(int $modification): self
    {
        $this->modification = $modification;

        return $this;
    }
}
