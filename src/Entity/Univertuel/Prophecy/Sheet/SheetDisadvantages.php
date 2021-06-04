<?php

namespace App\Entity\Univertuel\Prophecy\Sheet;

use App\Repository\Univertuel\Prophecy\Sheet\SheetDisadvantagesRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Prophecy\Game\Capacity\Disadvantage;

/**
 * @ORM\Entity(repositoryClass=SheetDisadvantagesRepository::class)
 * @ORM\Table(name="prophecy_sheet_disadvantages")
 */
class SheetDisadvantages
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $sheet;

    /**
     * @ORM\Column(type="integer")
     */
    private $disadvantages;

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

    public function getDisadvantages(): ?Disadvantage
    {
        return $this->disadvantages;
    }

    public function setDisadvantages(Disadvantage $disadvantages): self
    {
        $this->disadvantages = $disadvantages;

        return $this;
    }
}
