<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SupplementRepository")
 */
class Supplement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $derniereMinute;

    /**
     * @ORM\Column(type="boolean")
     */
    private $optionAnnulation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $horraireDemande;

    /**
     * @ORM\Column(type="boolean")
     */
    private $navetteNuit;

    /**
     * @ORM\Column(type="boolean")
     */
    private $priseDomicile;

    /**
     * @ORM\Column(type="boolean")
     */
    private $maiDecembre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Facture", inversedBy="supplement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $facture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDerniereMinute(): ?bool
    {
        return $this->derniereMinute;
    }

    public function setDerniereMinute(bool $derniereMinute): self
    {
        $this->derniereMinute = $derniereMinute;

        return $this;
    }

    public function getOptionAnnulation(): ?bool
    {
        return $this->optionAnnulation;
    }

    public function setOptionAnnulation(bool $optionAnnulation): self
    {
        $this->optionAnnulation = $optionAnnulation;

        return $this;
    }

    public function getHorraireDemande(): ?bool
    {
        return $this->horraireDemande;
    }

    public function setHorraireDemande(bool $horraireDemande): self
    {
        $this->horraireDemande = $horraireDemande;

        return $this;
    }

    public function getNavetteNuit(): ?bool
    {
        return $this->navetteNuit;
    }

    public function setNavetteNuit(bool $navetteNuit): self
    {
        $this->navetteNuit = $navetteNuit;

        return $this;
    }

    public function getPriseDomicile(): ?bool
    {
        return $this->priseDomicile;
    }

    public function setPriseDomicile(bool $priseDomicile): self
    {
        $this->priseDomicile = $priseDomicile;

        return $this;
    }

    public function getMaiDecembre(): ?bool
    {
        return $this->maiDecembre;
    }

    public function setMaiDecembre(bool $maiDecembre): self
    {
        $this->maiDecembre = $maiDecembre;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): self
    {
        $this->facture = $facture;

        return $this;
    }
}
