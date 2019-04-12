<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTotal;

    /**
     * @ORM\Column(type="float")
     */
    private $TVA;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $horsTaxe;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFacture;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reservation", mappedBy="facture", cascade={"persist", "remove"})
     */
    private $reservation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Supplement", mappedBy="facture", orphanRemoval=true)
     */
    private $supplement;

    public function __construct()
    {
        $this->supplement = new ArrayCollection();
        $this->dateFacture =  new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixTotal(): ?float
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(float $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function getTVA(): ?float
    {
        return $this->TVA;
    }

    public function setTVA(float $TVA): self
    {
        $this->TVA = $TVA;

        return $this;
    }

    public function getHorsTaxe(): ?float
    {
        return $this->horsTaxe;
    }

    public function setHorsTaxe(?float $horsTaxe): self
    {
        $this->horsTaxe = $horsTaxe;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->dateFacture;
    }

    public function setDateFacture(\DateTimeInterface $dateFacture): self
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        // set (or unset) the owning side of the relation if necessary
        $newFacture = $reservation === null ? null : $this;
        if ($newFacture !== $reservation->getFacture()) {
            $reservation->setFacture($newFacture);
        }

        return $this;
    }

    /**
     * @return Collection|supplement[]
     */
    public function getSupplement(): Collection
    {
        return $this->supplement;
    }

    public function addSupplement(supplement $supplement): self
    {
        if (!$this->supplement->contains($supplement)) {
            $this->supplement[] = $supplement;
            $supplement->setFacture($this);
        }

        return $this;
    }

    public function removeSupplement(supplement $supplement): self
    {
        if ($this->supplement->contains($supplement)) {
            $this->supplement->removeElement($supplement);
            // set the owning side to null (unless already changed)
            if ($supplement->getFacture() === $this) {
                $supplement->setFacture(null);
            }
        }

        return $this;
    }
    
    public function __toString(){
        return "Identifiant n°". $this->id;
    }
}
