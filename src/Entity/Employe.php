<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeRepository::class)
 */
class Employe
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
    private $Employe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateArrivee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="float")
     */
    private $salaire;

    /**
     * @ORM\OneToMany(targetEntity=Augmentation::class, mappedBy="idEmploye")
     */
    private $augmentations;

    /**
     * @ORM\OneToOne(targetEntity=Conge::class, mappedBy="idEmploye", cascade={"persist", "remove"})
     */
    private $conge;

    /**
     * @ORM\OneToMany(targetEntity=PosteEmploye::class, mappedBy="idEmploye")
     */
    private $posteEmployes;

    public function __construct()
    {
        $this->augmentations = new ArrayCollection();
        $this->posteEmployes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmploye(): ?string
    {
        return $this->Employe;
    }

    public function setEmploye(string $Employe): self
    {
        $this->Employe = $Employe;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->dateArrivee;
    }

    public function setDateArrivee(\DateTimeInterface $dateArrivee): self
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
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

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * @return Collection<int, Augmentation>
     */
    public function getAugmentations(): Collection
    {
        return $this->augmentations;
    }

    public function addAugmentation(Augmentation $augmentation): self
    {
        if (!$this->augmentations->contains($augmentation)) {
            $this->augmentations[] = $augmentation;
            $augmentation->setIdEmploye($this);
        }

        return $this;
    }

    public function removeAugmentation(Augmentation $augmentation): self
    {
        if ($this->augmentations->removeElement($augmentation)) {
            // set the owning side to null (unless already changed)
            if ($augmentation->getIdEmploye() === $this) {
                $augmentation->setIdEmploye(null);
            }
        }

        return $this;
    }

    public function getConge(): ?Conge
    {
        return $this->conge;
    }

    public function setConge(?Conge $conge): self
    {
        // unset the owning side of the relation if necessary
        if ($conge === null && $this->conge !== null) {
            $this->conge->setIdEmploye(null);
        }

        // set the owning side of the relation if necessary
        if ($conge !== null && $conge->getIdEmploye() !== $this) {
            $conge->setIdEmploye($this);
        }

        $this->conge = $conge;

        return $this;
    }

    /**
     * @return Collection<int, PosteEmploye>
     */
    public function getPosteEmployes(): Collection
    {
        return $this->posteEmployes;
    }

    public function addPosteEmploye(PosteEmploye $posteEmploye): self
    {
        if (!$this->posteEmployes->contains($posteEmploye)) {
            $this->posteEmployes[] = $posteEmploye;
            $posteEmploye->setIdEmploye($this);
        }

        return $this;
    }

    public function removePosteEmploye(PosteEmploye $posteEmploye): self
    {
        if ($this->posteEmployes->removeElement($posteEmploye)) {
            // set the owning side to null (unless already changed)
            if ($posteEmploye->getIdEmploye() === $this) {
                $posteEmploye->setIdEmploye(null);
            }
        }

        return $this;
    }
}
