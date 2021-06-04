<?php

namespace App\Entity\Univertuel\Prophecy\Sheet;

use App\Repository\Univertuel\Prophecy\Sheet\SheetAdvantagesRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Prophecy\Game\Capacity\Advantage;

/**
 * @ORM\Entity(repositoryClass=SheetAdvantagesRepository::class)
 * @ORM\Table(name="prophecy_sheet_advantages")
 */
class SheetAdvantages
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
    private $Advantages;

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

    public function getAdvantages(): ?Advantage
    {
        return $this->Advantages;
    }

    public function setAdvantages(Advantage $Advantages): self
    {
        $this->Advantages = $Advantages;

        return $this;
    }
}
