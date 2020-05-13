<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaysRepository::class)
 */
class Pays
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
    private $nomPays;

    /**
     * @ORM\Column(type="integer")
     */
    private $idPays;

    /**
     * @ORM\OneToMany(targetEntity=Region::class, mappedBy="idPays")
     */
    private $regions;

    /**
     * @ORM\ManyToMany(targetEntity=Noter::class, mappedBy="idPays")
     */
    private $noters;

    public function __construct()
    {
        $this->regions = new ArrayCollection();
        $this->noters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getnomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setnomPays(string $nomPays): self
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    public function getIdPays(): ?int
    {
        return $this->idPays;
    }

    public function setIdPays(int $idPays): self
    {
        $this->idPays = $idPays;

        return $this;
    }

    /**
     * @return Collection|Region[]
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(Region $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions[] = $region;
            $region->setIdPays($this);
        }

        return $this;
    }

    public function removeRegion(Region $region): self
    {
        if ($this->regions->contains($region)) {
            $this->regions->removeElement($region);
            // set the owning side to null (unless already changed)
            if ($region->getIdPays() === $this) {
                $region->setIdPays(null);
            }
        }

        return $this;
    }

}
