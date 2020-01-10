<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifcategoriecltRepository")
 * @ORM\HasLifecycleCallbacks()
 *@UniqueEntity(fields={"categorie","borneinferieure","bornesupperieur","capacite"}, message="cet intervalle existe déjà")
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
     * @Assert\NotBlank(message="Veuillez saisir le montant  !")
     */
    private $montant;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank(message="Veuillez saisir la borne supérieure  !")
     */
    private $bornesupperieur;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     */
    private $observation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank(message="Veuillez saisir la borne inférieure !")
     */
    private $borneinferieure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="tarifcategorieclts")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Veuillez choisir une categorie  !")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="tarifcategorieclts")
     * @ORM\JoinColumn(nullable=false)
     * * @Assert\NotBlank(message="Veuillez choisir un produit  !")
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
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Gedmo\Slug(fields={"borneinferieure","bornesupperieur"})
     */
    private $slug;

    /**
     *
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $editedOn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $editedBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Capacite", inversedBy="tarifcategorieclts")
     */
    private $capacite;

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

    public function getCapacite(): ?Capacite
    {
        return $this->capacite;
    }

    public function setCapacite(?Capacite $capacite): self
    {
        $this->capacite = $capacite;

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


}
