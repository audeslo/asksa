<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommanderRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"produit","capacitebidon","capacitecarton","commande"}, message="Ce produit existe déjà dans cette commande, veuillez modifier la quantité au besoin")
 */
class Commander
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="commanders")
     * @ORM\JoinColumn(nullable=false)
     *  @Assert\NotBlank(message="Veuillez choisir un produit !")
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commande", inversedBy="commanders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    /**
     * @ORM\Column(type="integer")
     *  @Assert\NotBlank(message="Veuillez saisir la quantite commandée !")
     */
    private $quantitecommandee;

    /**
     * @ORM\Column(type="integer")
     *  @Assert\NotBlank(message="Veuillez saisir la capacité du bidon !")
     */
    private $capacitebidon;

    /**
     * @ORM\Column(type="integer")
     *  @Assert\NotBlank(message="Veuillez saisir la capacité du carton !")
     */
    private $capacitecarton;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantiteenstock;

    /**
     * @ORM\Column(type="smallint")
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sousreference;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Gedmo\Slug(fields={"sousreference"})
     */
    private $slug;

    /**

     * @ORM\Column(type="datetime")
     */
    private $createdOn;

    /**

     * @ORM\Column(type="datetime", nullable=true)
     */
    private $editedOn;

    /**

     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $createdBy;

    /**

     * @ORM\ManyToOne(targetEntity="App\Entity\User")

     */
    private $editedBy;

    public function __construct()
    {
        $this->setEtat(1);
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


    public function getId(): ?int
    {
        return $this->id;
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

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }



    public function getCapacitecarton(): ?int
    {
        return $this->capacitecarton;
    }

    public function setCapacitecarton(int $capacitecarton): self
    {
        $this->capacitecarton = $capacitecarton;

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

    public function getQuantitecommandee(): ?int
    {
        return $this->quantitecommandee;
    }

    public function setQuantitecommandee(int $quantitecommandee): self
    {
        $this->quantitecommandee = $quantitecommandee;

        return $this;
    }

    public function getQuantiteenstock(): ?int
    {
        return $this->quantiteenstock;
    }

    public function setQuantiteenstock(int $quantiteenstock): self
    {
        $this->quantiteenstock = $quantiteenstock;

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

    public function getSousreference(): ?string
    {
        return $this->sousreference;
    }

    public function setSousreference(string $sousreference): self
    {
        $this->sousreference = $sousreference;

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

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getEditedOn(): ?\DateTimeInterface
    {
        return $this->editedOn;
    }

    public function setEditedOn(?\DateTimeInterface $editedOn): self
    {
        $this->editedOn = $editedOn;

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
        return $this->produit.'/'.$this->capacitecarton.'/'.$this->capacitebidon;
        // TODO: Implement __toString() method.
    }



}
