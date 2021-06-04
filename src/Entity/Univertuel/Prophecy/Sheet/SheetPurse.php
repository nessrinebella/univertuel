<?php

namespace App\Entity\Univertuel\Prophecy\Sheet;

use App\Repository\Univertuel\Prophecy\Sheet\SheetPurseRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Prophecy\Game\Item\Currency;

/**
 * @ORM\Entity(repositoryClass=SheetPurseRepository::class)
 * @ORM\Table(name="prophecy_sheet_purse")
 */
class SheetPurse
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Item\Currency")
     */
    private $currency;

    /**
     * @ORM\Column(type="integer", nullable=true)
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

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(Currency $currency): self
    {
        $this->currency = $currency;

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
