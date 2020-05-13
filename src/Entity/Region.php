<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region
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
    private $NomRegion;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="regions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPays;

    /**
     * @ORM\OneToMany(targetEntity=Ville::class, mappedBy="idRegion")
     */
    private $villes;

    /**
     * @ORM\OneToMany(targetEntity=Noter::class, mappedBy="idRegion")
     */
    private $noters;

    /**
     * @ORM\OneToMany(targetEntity=Nom::class, mappedBy="idRegion")
     */


    public function __construct()
    {
        $this->villes = new ArrayCollection();
        $this->noters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRegion(): ?string
    {
        return $this->NomRegion;
    }

    public function setNomRegion(string $NomRegion): self
    {
        $this->NomRegion = $NomRegion;

        return $this;
    }

    public function getIdPays(): ?Pays
    {
        return $this->idPays;
    }

    public function setIdPays(?Pays $idPays): self
    {
        $this->idPays = $idPays;

        return $this;
    }

    /**
     * @return Collection|Ville[]
     */
    public function getVilles(): Collection
    {
        return $this->villes;
    }

    public function addVille(Ville $ville): self
    {
        if (!$this->villes->contains($ville)) {
            $this->villes[] = $ville;
            $ville->setIdRegion($this);
        }

        return $this;
    }

    public function removeVille(Ville $ville): self
    {
        if ($this->villes->contains($ville)) {
            $this->villes->removeElement($ville);
            // set the owning side to null (unless already changed)
            if ($ville->getIdRegion() === $this) {
                $ville->setIdRegion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Noter[]
     */
    public function getNoters(): Collection
    {
        return $this->noters;
    }

    public function addNoter(Noter $noter): self
    {
        if (!$this->noters->contains($noter)) {
            $this->noters[] = $noter;
            $noter->setIdRegion($this);
        }

        return $this;
    }

    public function removeNoter(Noter $noter): self
    {
        if ($this->noters->contains($noter)) {
            $this->noters->removeElement($noter);
            // set the owning side to null (unless already changed)
            if ($noter->getIdRegion() === $this) {
                $noter->setIdRegion(null);
            }
        }

        return $this;
    }




   
}
