<?php

namespace App\Entity\Univertuel\Prophecy\Sheet;

use App\Repository\Univertuel\Prophecy\Sheet\SheetTendencyRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Prophecy\Game\Stat\Tendency;

/**
 * @ORM\Entity(repositoryClass=SheetTendencyRepository::class)
 * @ORM\Table(name="prophecy_sheet_tendency")
 */
class SheetTendency
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\Sheet")
     */
    private $sheet;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Stat\Tendency")
     */
    private $tendency;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $circles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSheet(): ?Sheet
    {
        return $this->sheet;
    }

    public function setSheet(Sheet $sheet): self
    {
        $this->sheet = $sheet;

        return $this;
    }

    public function getTendency(): ?Tendency
    {
        return $this->tendency;
    }

    public function setTendency(Tendency $tendency): self
    {
        $this->tendency = $tendency;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
    
    public function getCircles(): ?int
    {
        return $this->circles;
    }
    
    public function setCircles(int $circles): self
    {
        $this->circles = $circles;
        
        return $this;
    }
}
