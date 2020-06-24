<?php

namespace App\Entity;

use App\Repository\ClassePharmaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClassePharmaRepository::class)
 */
class ClassePharma
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classePharma;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $symptome;

    /**
     * @ORM\ManyToMany(targetEntity=Medicament::class, mappedBy="classesPharma")
     */
    private $medicaments;

    public function __construct()
    {
        $this->medicaments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassePharma(): ?string
    {
        return $this->classePharma;
    }

    public function setClassePharma(string $classePharma): self
    {
        $this->classePharma = $classePharma;

        return $this;
    }

    public function getSymptome(): ?string
    {
        return $this->symptome;
    }

    public function setSymptome(string $symptome): self
    {
        $this->symptome = $symptome;

        return $this;
    }

    /**
     * @return Collection|Medicament[]
     */
    public function getMedicaments(): Collection
    {
        return $this->medicaments;
    }

    public function addMedicament(Medicament $medicament): self
    {
        if (!$this->medicaments->contains($medicament)) {
            $this->medicaments[] = $medicament;
            $medicament->addClassesPharma($this);
        }

        return $this;
    }

    public function removeMedicament(Medicament $medicament): self
    {
        if ($this->medicaments->contains($medicament)) {
            $this->medicaments->removeElement($medicament);
            $medicament->removeClassesPharma($this);
        }

        return $this;
    }
}
