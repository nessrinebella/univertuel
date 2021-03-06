<?php

namespace App\Entity\User;

use App\Repository\User\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $login;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAvailable;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateLastUpdate;


    private $userGroup;
    
    public function __construct()
    {
        $this->setIsAvailable(true);
        $this->setDateCreation(new \DateTime());
        $this->setDateLastUpdate(new \DateTime());
        $group = new Group();
        //$group->setCode('writer');
        //$roles = ["ROLE_WRITER"];
        //$group->setCode('member');
        //$roles = ["ROLE_MEMBER"];
        $group->setCode('sadmin');
        $roles = ["ROLE_SADMIN"];
        $group->setRoles($roles);
        $this->setUserGroup($group);
        $this->setRoles($group->getRoles());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getDateCreation(): ?string
    {
        return date_format($this->dateCreation, "D j F YYYY ?? H:i:s");
    }
    
    public function setDateCreation($dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        
        return $this;
    }
    
    public function getDateLastUpdate(): ?string
    {
        return date_format($this->dateLastUpdate, "D j F YYYY ?? H:i:s");
    }
    
    public function setDateLastUpdate($dateLastUpdate): self
    {
        $this->dateLastUpdate = $dateLastUpdate;
        
        return $this;
    }

    public function getUserGroup(): ?Group
    {
        return $this->userGroup;
    }

    public function setUserGroup(Group $userGroup): self
    {
        $this->userGroup = $userGroup;

        return $this;
    }
    
    public function __toString()
    {
        return $this->getLogin();
    }
}
