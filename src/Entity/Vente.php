<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VenteRepository")
 */
class Vente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="date")
     * @Assert\Date(message="Veuillez saisir une date valide !")
     */
    private $datevente;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Gedmo\Slug(fields={"reference"})
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $editedOn;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $createdOn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $editedBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $createdBy;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantiteachetee;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacitecartonvente;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacitebidonvente;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stockshowroom")
     */
    private $stockshowroom;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function __construct()
    {
        $this->setDatevente(new \DateTime('now'));
    }
    /**
     * @ORM\PrePersist()
     */
    public function datecreated()
    {
        $this->setCreatedOn(new \DateTime('now'));
    }

    /**
     * @ORM\PreUpdate()
     */
    public function dateupdated()
    {
        $this->setEditedOn(new \DateTime('now'));
    }


    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDatevente(): ?\DateTimeInterface
    {
        return $this->datevente;
    }

    public function setDatevente(\DateTimeInterface $datevente): self
    {
        $this->datevente = $datevente;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getEditedOn(): ?string
    {
        return $this->editedOn;
    }

    public function setEditedOn(string $editedOn): self
    {
        $this->editedOn = $editedOn;

        return $this;
    }

    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    public function setCreatedOn(string $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getEditedBy(): ?User
    {
        return $this->editedBy;
    }

    public function setEditedBy(?User $editedBy): self
    {
        $this->editedBy = $editedBy;

        return $this;
    }


    public function __toString()
    {
        return $this->reference;
        // TODO: Implement __toString() method.
    }

    public function getQuantiteachetee(): ?int
    {
        return $this->quantiteachetee;
    }

    public function setQuantiteachetee(int $quantiteachetee): self
    {
        $this->quantiteachetee = $quantiteachetee;

        return $this;
    }

    public function getCapacitecartonvente(): ?int
    {
        return $this->capacitecartonvente;
    }

    public function setCapacitecartonvente(int $capacitecartonvente): self
    {
        $this->capacitecartonvente = $capacitecartonvente;

        return $this;
    }

    public function getCapacitebidonvente(): ?int
    {
        return $this->capacitebidonvente;
    }

    public function setCapacitebidonvente(int $capacitebidonvente): self
    {
        $this->capacitebidonvente = $capacitebidonvente;

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

    public function getStockshowroom(): ?Stockshowroom
    {
        return $this->stockshowroom;
    }

    public function setStockshowroom(?Stockshowroom $stockshowroom): self
    {
        $this->stockshowroom = $stockshowroom;

        return $this;
    }

}
