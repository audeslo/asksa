<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VenteStockRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class VenteStock
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
    private $contenant;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="integer")
     */
    private $bidon;

    /**
     * @ORM\Column(type="integer")
     */
    private $carton;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Venteshowroom", inversedBy="venteStocks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $venteshowroom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="venteStocks")
     */
    private $produit;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdOn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $createdBy;

    /**
     * @ORM\PrePersist()
     */
    public function datecreated()
    {
        $this->setCreatedOn(new \DateTime('now'));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenant(): ?string
    {
        return $this->contenant;
    }

    public function setContenant(string $contenant): self
    {
        $this->contenant = $contenant;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getBidon(): ?int
    {
        return $this->bidon;
    }

    public function setBidon(int $bidon): self
    {
        $this->bidon = $bidon;

        return $this;
    }

    public function getCarton(): ?int
    {
        return $this->carton;
    }

    public function setCarton(int $carton): self
    {
        $this->carton = $carton;

        return $this;
    }

    public function getVenteshowroom(): ?Venteshowroom
    {
        return $this->venteshowroom;
    }

    public function setVenteshowroom(?Venteshowroom $venteshowroom): self
    {
        $this->venteshowroom = $venteshowroom;

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

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

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
}
