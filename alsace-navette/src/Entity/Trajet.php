<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrajetRepository")
 */
class Trajet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateTrajet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="trajet")
     */
    private $reservations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicule")
     */
    private $vehicule;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Chauffeur")
     */
    private $chauffeur;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->dateTrajet = new \DateTime();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTrajet(): ?\DateTimeInterface
    {
        return $this->dateTrajet;
    }

    public function setDateTrajet(\DateTimeInterface $dateTrajet): self
    {
        $this->dateTrajet = $dateTrajet;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setTrajet($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getTrajet() === $this) {
                $reservation->setTrajet(null);
            }
        }

        return $this;
    }

    public function getVehicule(): ?vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getChauffeur(): ?chauffeur
    {
        return $this->chauffeur;
    }

    public function setChauffeur(?chauffeur $chauffeur): self
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }
    
    public function __toString(){
        return "trajet numero " .$this->id;
    }
}
