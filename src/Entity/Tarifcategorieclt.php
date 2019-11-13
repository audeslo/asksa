<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifcategoriecltRepository")
 */
class Tarifcategorieclt
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
    private $montant;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bornesupperieur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $observation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $borneinferieure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="tarifcategorieclts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="tarifcategorieclts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(?int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getBornesupperieur(): ?int
    {
        return $this->bornesupperieur;
    }

    public function setBornesupperieur(?int $bornesupperieur): self
    {
        $this->bornesupperieur = $bornesupperieur;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getBorneinferieure(): ?int
    {
        return $this->borneinferieure;
    }

    public function setBorneinferieure(?int $borneinferieure): self
    {
        $this->borneinferieure = $borneinferieure;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
