<?php

namespace App\Entity\Univertuel\Prophecy\Sheet;

use App\Repository\Univertuel\Prophecy\Sheet\SheetStatisticRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Prophecy\Game\Stat\Statistic;

/**
 * @ORM\Entity(repositoryClass=SheetStatisticRepository::class)
 * @ORM\Table(name="prophecy_sheet_statistic")
 */
class SheetStatistic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Stat\Statistic")
     */
    private $statistic;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\Sheet")
     */
    private $sheet;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatistic(): ?Statistic
    {
        return $this->statistic;
    }

    public function setStatistic(Statistic $statistic): self
    {
        $this->statistic = $statistic;

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

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
