<?php

namespace App\Entity\Univertuel\Prophecy\Sheet;

use App\Repository\Univertuel\Prophecy\Sheet\SheetWoundsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Prophecy\Game\Stat\Wounds;
  
/**
 * @ORM\Entity(repositoryClass=SheetWoundsRepository::class)
 * @ORM\Table(name="prophecy_sheet_wounds")
 */
class SheetWounds
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Stat\Wounds")
     */
    private $wounds;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\Sheet")
     */
    private $sheet;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxVal;

    /**
     * @ORM\Column(type="integer")
     */
    private $currentValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWounds(): ?Wounds
    {
        return $this->wounds;
    }

    public function setWounds(Wounds $wounds): self
    {
        $this->wounds = $wounds;

        return $this;
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

    public function getMaxVal(): ?int
    {
        return $this->maxVal;
    }

    public function setMaxVal(int $maxVal): self
    {
        $this->maxVal = $maxVal;

        return $this;
    }

    public function getCurrentValue(): ?int
    {
        return $this->currentValue;
    }

    public function setCurrentValue(int $currentValue): self
    {
        $this->currentValue = $currentValue;

        return $this;
    }
}
