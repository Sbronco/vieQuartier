<?php

namespace App\Entity;

use App\Repository\NoterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoterRepository::class)
 */
class Noter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteTourisme;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteTransport;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteLoisir;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteQualiteVie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteComServ;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteEducation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteServicePublique;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $notePopulation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteGlobal;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="noterss")
     */
    private $idVille;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="noters")
     */
    private $idRegion;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="noterss")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoteTourisme(): ?int
    {
        return $this->noteTourisme;
    }

    public function setNoteTourisme(?int $noteTourisme): self
    {
        $this->noteTourisme = $noteTourisme;

        return $this;
    }

    public function getNoteTransport(): ?int
    {
        return $this->noteTransport;
    }

    public function setNoteTransport(?int $noteTransport): self
    {
        $this->noteTransport = $noteTransport;

        return $this;
    }

    public function getNoteLoisir(): ?int
    {
        return $this->noteLoisir;
    }

    public function setNoteLoisir(?int $noteLoisir): self
    {
        $this->noteLoisir = $noteLoisir;

        return $this;
    }

    public function getNoteQualiteVie(): ?int
    {
        return $this->noteQualiteVie;
    }

    public function setNoteQualiteVie(?int $noteQualiteVie): self
    {
        $this->noteQualiteVie = $noteQualiteVie;

        return $this;
    }

    public function getNoteComServ(): ?int
    {
        return $this->noteComServ;
    }

    public function setNoteComServ(?int $noteComServ): self
    {
        $this->noteComServ = $noteComServ;

        return $this;
    }

    public function getNoteEducation(): ?int
    {
        return $this->noteEducation;
    }

    public function setNoteEducation(?int $noteEducation): self
    {
        $this->noteEducation = $noteEducation;

        return $this;
    }

    public function getNoteServicePublique(): ?int
    {
        return $this->noteServicePublique;
    }

    public function setNoteServicePublique(?int $noteServicePublique): self
    {
        $this->noteServicePublique = $noteServicePublique;

        return $this;
    }

    public function getNotePopulation(): ?int
    {
        return $this->notePopulation;
    }

    public function setNotePopulation(?int $notePopulation): self
    {
        $this->notePopulation = $notePopulation;

        return $this;
    }


    public function getNoteGlobal(): ?int
    {
        return $this->noteGlobal;
    }

    public function setNoteGlobal(?int $noteGlobal): self
    {
        $this->noteGlobal = $noteGlobal;

        return $this;
    }

    public function getIdVille(): ?Ville
    {
        return $this->idVille;
    }

    public function setIdVille(?Ville $idVille): self
    {
        $this->idVille = $idVille;

        return $this;
    }

    public function getIdRegion(): ?Region
    {
        return $this->idRegion;
    }

    public function setIdRegion(?Region $idRegion): self
    {
        $this->idRegion = $idRegion;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
