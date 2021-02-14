<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
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
     * @ORM\Column(type="string", length=255)
     */
    private $FullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Address;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="users")
     */
    private $Departement;

    /**
     * @ORM\ManyToOne(targetEntity=Grade::class, inversedBy="users")
     */
    private $Grade;

    /**
     * @ORM\ManyToMany(targetEntity=Meeting::class, mappedBy="Participants")
     */
    private $meetings;

    /**
     * @ORM\OneToMany(targetEntity=Furlough::class, mappedBy="employer")
     */
    private $furloughs;

    public function __construct()
    {
        $this->meetings = new ArrayCollection();
        $this->furloughs = new ArrayCollection();
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

    public function __toString()
    {
        return $this->getFullName();
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
        return (string) $this->password;
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

    public function getFullName(): ?string
    {
        return $this->FullName;
    }

    public function setFullName(string $FullName): self
    {
        $this->FullName = $FullName;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(string $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->Departement;
    }

    public function setDepartement(?Departement $Departement): self
    {
        $this->Departement = $Departement;

        return $this;
    }

    public function getGrade(): ?Grade
    {
        return $this->Grade;
    }

    public function setGrade(?Grade $Grade): self
    {
        $this->Grade = $Grade;

        return $this;
    }

    /**
     * @return Collection|Meeting[]
     */
    public function getMeetings(): Collection
    {
        return $this->meetings;
    }

    public function addMeeting(Meeting $meeting): self
    {
        if (!$this->meetings->contains($meeting)) {
            $this->meetings[] = $meeting;
            $meeting->addParticipant($this);
        }

        return $this;
    }

    public function removeMeeting(Meeting $meeting): self
    {
        if ($this->meetings->removeElement($meeting)) {
            $meeting->removeParticipant($this);
        }

        return $this;
    }

    /**
     * @return Collection|Furlough[]
     */
    public function getFurloughs(): Collection
    {
        return $this->furloughs;
    }

    public function addFurlough(Furlough $furlough): self
    {
        if (!$this->furloughs->contains($furlough)) {
            $this->furloughs[] = $furlough;
            $furlough->setEmployer($this);
        }

        return $this;
    }

    public function removeFurlough(Furlough $furlough): self
    {
        if ($this->furloughs->removeElement($furlough)) {
            // set the owning side to null (unless already changed)
            if ($furlough->getEmployer() === $this) {
                $furlough->setEmployer(null);
            }
        }

        return $this;
    }
}
