<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandershowRepository")
 */
class Commandershow
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacitecartonshow;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacitebidonshow;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantitecommandeshow;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantitestock;

    /**
     * @ORM\Column(type="smallint")
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime")
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
     *  @Assert\NotBlank(message="Veuillez choisir un produit !")
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commandeshow")
     */
    private $commandeshow;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacitecartonshow(): ?int
    {
        return $this->capacitecartonshow;
    }

    public function setCapacitecartonshow(int $capacitecartonshow): self
    {
        $this->capacitecartonshow = $capacitecartonshow;

        return $this;
    }

    public function getCapacitebidonshow(): ?int
    {
        return $this->capacitebidonshow;
    }

    public function setCapacitebidonshow(int $capacitebidonshow): self
    {
        $this->capacitebidonshow = $capacitebidonshow;

        return $this;
    }

    public function getQuantitecommandeshow(): ?int
    {
        return $this->quantitecommandeshow;
    }

    public function setQuantitecommandeshow(int $quantitecommandeshow): self
    {
        $this->quantitecommandeshow = $quantitecommandeshow;

        return $this;
    }

    public function getQuantitestock(): ?int
    {
        return $this->quantitestock;
    }

    public function setQuantitestock(int $quantitestock): self
    {
        $this->quantitestock = $quantitestock;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

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

    public function getCommandeshow(): ?Commandeshow
    {
        return $this->commandeshow;
    }

    public function setCommandeshow(?Commandeshow $commandeshow): self
    {
        $this->commandeshow = $commandeshow;

        return $this;
    }

}
