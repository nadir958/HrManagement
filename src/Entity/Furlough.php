<?php

namespace App\Entity;

use App\Repository\FurloughRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FurloughRepository::class)
 */
class Furlough
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
    private $Cause;

    /**
     * @ORM\Column(type="date")
     */
    private $Begin;

    /**
     * @ORM\Column(type="date")
     */
    private $End;

    /**
     * @ORM\Column(type="boolean")
     */
    private $State;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="furloughs")
     */
    private $employer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCause(): ?string
    {
        return $this->Cause;
    }

    public function setCause(string $Cause): self
    {
        $this->Cause = $Cause;

        return $this;
    }

    public function getBegin(): ?\DateTimeInterface
    {
        return $this->Begin;
    }

    public function setBegin(\DateTimeInterface $Begin): self
    {
        $this->Begin = $Begin;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->End;
    }

    public function setEnd(\DateTimeInterface $End): self
    {
        $this->End = $End;

        return $this;
    }

    public function getState(): ?bool
    {
        return $this->State;
    }

    public function setState(bool $State): self
    {
        $this->State = $State;

        return $this;
    }

    public function getEmployer(): ?user
    {
        return $this->employer;
    }

    public function setEmployer(?user $employer): self
    {
        $this->employer = $employer;

        return $this;
    }
}
