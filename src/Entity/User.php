<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressIP;

    /**
     * @ORM\OneToMany(targetEntity=Noter::class, mappedBy="idUser")
     */
    private $noterss;

    /**
     * @ORM\OneToMany(targetEntity=Noter::class, mappedBy="idUser")
     */


    public function __construct()
    {
        $this->noterss = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getAdressIP(): ?string
    {
        return $this->adressIP;
    }

    public function setAdressIP(string $adressIP): self
    {
        $this->adressIP = $adressIP;

        return $this;
    }

    /**
     * @return Collection|Noter[]
     */
    public function getNoterss(): Collection
    {
        return $this->noterss;
    }

    public function addNoterss(Noter $noterss): self
    {
        if (!$this->noterss->contains($noterss)) {
            $this->noterss[] = $noterss;
            $noterss->setIdUser($this);
        }

        return $this;
    }

    public function removeNoterss(Noter $noterss): self
    {
        if ($this->noterss->contains($noterss)) {
            $this->noterss->removeElement($noterss);
            // set the owning side to null (unless already changed)
            if ($noterss->getIdUser() === $this) {
                $noterss->setIdUser(null);
            }
        }

        return $this;
    }
}
