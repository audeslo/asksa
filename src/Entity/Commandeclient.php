<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeclientRepository")
 */
class Commandeclient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clientcommande;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produitclient;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantitecommande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $referencecommande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientcommande(): ?Client
    {
        return $this->clientcommande;
    }

    public function setClientcommande(?Client $clientcommande): self
    {
        $this->clientcommande = $clientcommande;

        return $this;
    }

    public function getProduitclient(): ?Produit
    {
        return $this->produitclient;
    }

    public function setProduitclient(?Produit $produitclient): self
    {
        $this->produitclient = $produitclient;

        return $this;
    }

    public function getQuantitecommande(): ?int
    {
        return $this->quantitecommande;
    }

    public function setQuantitecommande(int $quantitecommande): self
    {
        $this->quantitecommande = $quantitecommande;

        return $this;
    }

    public function getReferencecommande(): ?string
    {
        return $this->referencecommande;
    }

    public function setReferencecommande(string $referencecommande): self
    {
        $this->referencecommande = $referencecommande;

        return $this;
    }
}
