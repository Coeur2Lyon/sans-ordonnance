<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicamentRepository::class)
 */
class Medicament
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
    private $nomMedic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $posologieRecommandee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $posologieMAX;

    /**
     * @ORM\ManyToMany(targetEntity=ClassePharma::class, inversedBy="medicaments")
     */
    private $classesPharma;

    /**
     * @ORM\ManyToMany(targetEntity=Excipient::class, inversedBy="medicaments")
     */
    private $excipients;



    /**
     * @ORM\ManyToMany(targetEntity=PrincipeActif::class, inversedBy="medicaments")
     */
    private $principesActif;

    public function __construct()
    {
        $this->classesPharma = new ArrayCollection();
        $this->excipients = new ArrayCollection();
        $this->principesActif = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMedic(): ?string
    {
        return $this->nomMedic;
    }

    public function setNomMedic(string $nomMedic): self
    {
        $this->nomMedic = $nomMedic;

        return $this;
    }

    public function getPosologieRecommandee(): ?string
    {
        return $this->posologieRecommandee;
    }

    public function setPosologieRecommandee(string $posologieRecommandee): self
    {
        $this->posologieRecommandee = $posologieRecommandee;

        return $this;
    }

    public function getPosologieMAX(): ?string
    {
        return $this->posologieMAX;
    }

    public function setPosologieMAX(string $posologieMAX): self
    {
        $this->posologieMAX = $posologieMAX;

        return $this;
    }

    /**
     * @return Collection|ClassePharma[]
     */
    public function getClassesPharma(): Collection
    {
        return $this->classesPharma;
    }

    public function addClassesPharma(ClassePharma $classesPharma): self
    {
        if (!$this->classesPharma->contains($classesPharma)) {
            $this->classesPharma[] = $classesPharma;
        }

        return $this;
    }

    public function removeClassesPharma(ClassePharma $classesPharma): self
    {
        if ($this->classesPharma->contains($classesPharma)) {
            $this->classesPharma->removeElement($classesPharma);
        }

        return $this;
    }

    /**
     * @return Collection|Excipient[]
     */
    public function getExcipients(): Collection
    {
        return $this->excipients;
    }

    public function addExcipient(Excipient $excipient): self
    {
        if (!$this->excipients->contains($excipient)) {
            $this->excipients[] = $excipient;
        }

        return $this;
    }

    public function removeExcipient(Excipient $excipient): self
    {
        if ($this->excipients->contains($excipient)) {
            $this->excipients->removeElement($excipient);
        }

        return $this;
    }

    /**
     * @return Collection|PrincipeActif[]
     */
    public function getPrincipesActif(): Collection
    {
        return $this->principesActif;
    }

    public function addPrincipesActif(PrincipeActif $principesActif): self
    {
        if (!$this->principesActif->contains($principesActif)) {
            $this->principesActif[] = $principesActif;
        }

        return $this;
    }

    public function removePrincipesActif(PrincipeActif $principesActif): self
    {
        if ($this->principesActif->contains($principesActif)) {
            $this->principesActif->removeElement($principesActif);
        }

        return $this;
    }
}
