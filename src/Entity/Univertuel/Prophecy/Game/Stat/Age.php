<?php

namespace App\Entity\Univertuel\Prophecy\Game\Stat;

use App\Repository\Univertuel\Prophecy\Game\Stat\AgeRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Univertuel\Game\Game;

/**
 * @ORM\Entity(repositoryClass=AgeRepository::class)
 * @ORM\Table(name="prophecy_age")
 */
class Age
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
     * @ORM\Column(type="integer")
     */
    private $minVal;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxVal;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $attribute1;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $attribute2;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $attribute3;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $attribute4;

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

    public function getMinVal(): ?int
    {
        return $this->minVal;
    }

    public function setMinVal(int $minVal): self
    {
        $this->minVal = $minVal;

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
    
    public function getAttribute1()
    {
        return $this->attribute1;
    }
    
    public function getAttribute2()
    {
        return $this->attribute2;
    }
    
    public function getAttribute3()
    {
        return $this->attribute3;
    }
    
    public function getAttribute4()
    {
        return $this->attribute4;
    }
    
    public function setAttribute1($attribute1)
    {
        $this->attribute1 = $attribute1;
    }
    
    public function setAttribute2($attribute2)
    {
        $this->attribute2 = $attribute2;
    }
    
    public function setAttribute3($attribute3)
    {
        $this->attribute3 = $attribute3;
    }
    
    public function setAttribute4($attribute4)
    {
        $this->attribute4 = $attribute4;
    }
    
}
