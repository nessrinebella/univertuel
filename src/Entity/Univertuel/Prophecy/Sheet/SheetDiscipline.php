<?php

namespace App\Entity\Univertuel\Prophecy\Sheet;

use App\Repository\Univertuel\Prophecy\Sheet\SheetDisciplineRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Prophecy\Game\Capacity\Discipline;

/**
 * @ORM\Entity(repositoryClass=SheetDisciplineRepository::class)
 * @ORM\Table(name="prophecy_sheet_discipline")
 */
class SheetDiscipline
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Capacity\Discipline")
     */
    private $discipline;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

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

    public function getDiscipline(): ?Discipline
    {
        return $this->discipline;
    }

    public function setDiscipline(Discipline $discipline): self
    {
        $this->discipline = $discipline;

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
