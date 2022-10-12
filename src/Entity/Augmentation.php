<?php

namespace App\Entity;

use App\Repository\AugmentationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AugmentationRepository::class)
 */
class Augmentation
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
    private $Augmentation;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $ancienSalaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $pourcentageAugmentation;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="augmentations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEmploye;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAugmentation(): ?string
    {
        return $this->Augmentation;
    }

    public function setAugmentation(string $Augmentation): self
    {
        $this->Augmentation = $Augmentation;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAncienSalaire(): ?float
    {
        return $this->ancienSalaire;
    }

    public function setAncienSalaire(float $ancienSalaire): self
    {
        $this->ancienSalaire = $ancienSalaire;

        return $this;
    }

    public function getPourcentageAugmentation(): ?int
    {
        return $this->pourcentageAugmentation;
    }

    public function setPourcentageAugmentation(int $pourcentageAugmentation): self
    {
        $this->pourcentageAugmentation = $pourcentageAugmentation;

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
