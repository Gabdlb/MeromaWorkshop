<?php

namespace App\Entity;

use App\Repository\PosteEmployeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PosteEmployeRepository::class)
 */
class PosteEmploye
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
    private $service;

    /**
     * @ORM\Column(type="date")
     */
    private $dateAffectation;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="posteEmployes")
     */
    private $idEmploye;

    /**
     * @ORM\ManyToOne(targetEntity=Poste::class, inversedBy="posteEmployes")
     */
    private $idPoste;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getDateAffectation(): ?\DateTimeInterface
    {
        return $this->dateAffectation;
    }

    public function setDateAffectation(\DateTimeInterface $dateAffectation): self
    {
        $this->dateAffectation = $dateAffectation;

        return $this;
    }

    public function getIdEmploye(): ?Employe
    {
        return $this->idEmploye;
    }

    public function setIdEmploye(?Employe $idEmploye): self
    {
        $this->idEmploye = $idEmploye;

        return $this;
    }

    public function getIdPoste(): ?Poste
    {
        return $this->idPoste;
    }

    public function setIdPoste(?Poste $idPoste): self
    {
        $this->idPoste = $idPoste;

        return $this;
    }
}
