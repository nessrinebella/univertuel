<?php

namespace App\Entity\Univertuel\Prophecy\Sheet;

use App\Repository\Univertuel\Prophecy\Sheet\SheetRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Univertuel\Campaign\Campaign;
use App\Entity\Univertuel\Prophecy\Game\Stat\Country;
use App\Entity\Univertuel\Prophecy\Game\Stat\Omen;
use App\Entity\User\User;
use App\Entity\Univertuel\Prophecy\Game\Capacity\Discipline;
use App\Entity\Univertuel\Prophecy\Game\Item\Various;
use App\Entity\Univertuel\Prophecy\Game\Stat\Caste;
use App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic;

/**
 * @ORM\Entity(repositoryClass=SheetRepository::class)
 * @ORM\Table(name="prophecy_sheet")
 */
class Sheet
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
    private $name;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Stat\Age")
     */
    private $age;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Stat\Caste")
     */
    private $caste;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Item\Various")
     */
    private $items ;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Campaign\Campaign")
     */
    private $campaign;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Stat\Country")
     */
    private $country;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Game\Stat\Omen")
     */
    private $omen;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $initiative;

    /**
     * @ORM\Column(type="integer",  nullable=true)
     */
    private $chance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mastery;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $famous;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\user")
     */
    private $owner;

    /**
     * @ORM\Column(type="array")
     * @ORM\JoinColumn(nullable=true)
     */
    private $spells = [];

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private $background;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\SheetPurse")
     */
    private $purse;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\SheetMagicDomain")
     */
    private $magicDomain;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\SheetDiscipline")
     */
    private $disciplines ;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\SheetTendency")
     */
    private $tendencies ;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\SheetWounds")
     */
    private $wounds ;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\SheetCaracteristics", mappedBy="sheet")
     */
    private $caracteristics = [];
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\SheetStatistic")
     * A SUPPRIMER
     */
    private $statistics ;
    
    //TODO Il reste quelques propriétés a FAIRE
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\SheetAttributes")
     */
    private $attributes;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Univertuel\Prophecy\Sheet\SheetSkills")
     */
    private $skills;


    public function __construct()
    {
        $this->caracteristics = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getAge()
    {
        return $this->age;
    }
    
    public function setAge($age)
    {
        $this->age = $age;
    }
    
    public function getItems(): ?Various
    {
        return $this->items;
    }

    public function setItems(Various $items): self
    {
        $this->items = $items;

        return $this;
    }

    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    public function setCampaign(Campaign $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getOmen(): ?Omen
    {
        return $this->omen;
    }

    public function setOmen(Omen $omen): self
    {
        $this->omen = $omen;

        return $this;
    }

    public function getInitiative(): ?int
    {
        return $this->initiative;
    }

    public function setInitiative(?int $initiative): self
    {
        $this->initiative = $initiative;

        return $this;
    }

    public function getChance(): ?int
    {
        return $this->chance;
    }

    public function setChance(int $chance): self
    {
        $this->chance = $chance;

        return $this;
    }

    public function getMastery(): ?int
    {
        return $this->mastery;
    }

    public function setMastery(int $mastery): self
    {
        $this->mastery = $mastery;

        return $this;
    }

    public function getFamous(): ?int
    {
        return $this->famous;
    }

    public function setFamous(int $famous): self
    {
        $this->famous = $famous;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getSpells(): ?array
    {
        return $this->spells;
    }

    public function setSpells(array $spells): self
    {
        $this->spells = $spells;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getPurse(): ?SheetPurse
    {
        return $this->purse;
    }

    public function setPurse(SheetPurse $purse): self
    {
        $this->purse = $purse;

        return $this;
    }

    public function getMagicDomain(): ?int
    {
        return $this->magicDomain;
    }

    public function setMagicDomain(int $magicDomain): self
    {
        $this->magicDomain = $magicDomain;

        return $this;
    }

    public function getDisciplines(): ?Discipline
    {
        return $this->disciplines;
    }

    public function setDisciplines(Discipline $disciplines): self
    {
        $this->disciplines = $disciplines;

        return $this;
    }

    public function getTendencies(): ?SheetTendency
    {
        return $this->tendencies;
    }

    public function setTendencies(SheetTendency $tendencies): self
    {
        $this->tendencies = $tendencies;

        return $this;
    }

    public function getWounds(): ?SheetWounds
    {
        return $this->wounds;
    }

    public function setWounds(SheetWounds $wounds): self
    {
        $this->wounds = $wounds;

        return $this;
    }

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }

    public function setStatistics(array $statistics): self
    {
        $this->statistics = $statistics;

        return $this;
    }
    
    public function getAttributes(): ?SheetAttributes
    {
        return $this->attributes;
    }
    
    
    public function getCaracteristics(): ?SheetCaracteristics
    {
        return $this->caracteristics;
    }
    
    
    public function getSkills(): ?SheetSkills
    {
        return $this->skills;
    }
       
    public function setAttributes(SheetAttributes $attributes): self
    {
        $this->attributes = $attributes;
    }
    
    public function setCaracteristics(SheetCaracteristics $caracteristics): self
    {
        $this->caracteristics = $caracteristics;
    }
    
    public function setSkills(SheetSkills $skills): self
    {
        $this->skills = $skills;
    }
    
    public function getCaste(): ?Caste
    {
        return $this->caste;
    }

    public function setCaste(Caste $caste)
    {
        $this->caste = $caste;
    }
    
    public function addCaracteristic($element)
    {
        if(!$this->caracteristics->contains($element))
        {
            $this->caracteristics->add($element);
        }
    }
    
    public function removeCaracteristic($element)
    {
        if($this->caracteristics->contains($element))
        {
            $this->caracteristics->remove($element);
        }
    }
}
