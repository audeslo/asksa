<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VenteshowroomRepository")
 */
class Venteshowroom
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
    private $reference;



    /**
     * @ORM\Column(type="date")
     */
    private $datevente;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantitecarton;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacitebidon;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantiteachete;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $editedOn;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdOn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $editedBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\PrePersist()
     */
    public function datecreated()
    {
        $this->setCreatedOn(new \DateTime('now'));
    }

    public function editedOn()
    {
        $this->setEditedOn()(new \DateTime('now'));
    }

    /**
     * @ORM\PreUpdate()
     */
    public function dateupdated()
    {
        $this->setEditedOn(new \DateTime('now'));
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stockshowroom")
     */
    private $stockshowroom;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $payer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Grosdetail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modereglement;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuantitecarton(): ?int
    {
        return $this->quantitecarton;
    }

    public function setQuantitecarton(int $quantitecarton): self
    {
        $this->quantitecarton = $quantitecarton;

        return $this;
    }

    public function getCapacitebidon(): ?int
    {
        return $this->capacitebidon;
    }

    public function setCapacitebidon(int $capacitebidon): self
    {
        $this->capacitebidon = $capacitebidon;

        return $this;
    }

    public function getQuantiteachete(): ?int
    {
        return $this->quantiteachete;
    }

    public function setQuantiteachete(int $quantiteachete): self
    {
        $this->quantiteachete = $quantiteachete;

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

    public function getEditedOn(): ?\DateTimeInterface
    {
        return $this->editedOn;
    }

    public function setEditedOn(\DateTimeInterface $editedOn): self
    {
        $this->editedOn = $editedOn;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

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

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

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
    public function __toString()
    {
        return $this->reference;
        // TODO: Implement __toString() method.
    }

    public function getPayer(): ?int
    {
        return $this->payer;
    }

    public function setPayer(?int $payer): self
    {
        $this->payer = $payer;

        return $this;
    }

    public function getGrosdetail(): ?string
    {
        return $this->Grosdetail;
    }

    public function setGrosdetail(string $Grosdetail): self
    {
        $this->Grosdetail = $Grosdetail;

        return $this;
    }

    public function getModereglement(): ?string
    {
        return $this->modereglement;
    }

    public function setModereglement(string $modereglement): self
    {
        $this->modereglement = $modereglement;

        return $this;
    }


}
