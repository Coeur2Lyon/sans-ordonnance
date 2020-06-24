<?php

namespace App\Entity;

use App\Repository\PrincipeActifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrincipeActifRepository::class)
 */
class PrincipeActif
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
    private $principeActif;

    /**
     * @ORM\ManyToMany(targetEntity=Medicament::class, mappedBy="principesActif")
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

    public function getPrincipeActif(): ?string
    {
        return $this->principeActif;
    }

    public function setPrincipeActif(string $principeActif): self
    {
        $this->principeActif = $principeActif;

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
            $medicament->addPrincipesActif($this);
        }

        return $this;
    }

    public function removeMedicament(Medicament $medicament): self
    {
        if ($this->medicaments->contains($medicament)) {
            $this->medicaments->removeElement($medicament);
            $medicament->removePrincipesActif($this);
        }

        return $this;
    }
}
