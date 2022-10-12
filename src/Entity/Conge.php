<?php

namespace App\Entity;

use App\Repository\CongeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CongeRepository::class)
 */
class Conge
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDernierConge;

    /**
     * @ORM\Column(type="integer")
     */
    private $congeRestant;

    /**
     * @ORM\OneToOne(targetEntity=Employe::class, inversedBy="conge", cascade={"persist", "remove"})
     */
    private $idEmploye;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDernierConge(): ?\DateTimeInterface
    {
        return $this->dateDernierConge;
    }

    public function setDateDernierConge(\DateTimeInterface $dateDernierConge): self
    {
        $this->dateDernierConge = $dateDernierConge;

        return $this;
    }

    public function getCongeRestant(): ?int
    {
        return $this->congeRestant;
    }

    public function setCongeRestant(int $congeRestant): self
    {
        $this->congeRestant = $congeRestant;

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
}
