<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @ORM\HasLifecycleCallbacks()

 */

class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    @ORM\Column(type="string", length=255, nullable=true)

     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez saisir la désignation !")
     */
    private $designation;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Veuillez saisir le prix unitaire !")
     */
    private $prixU;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Veuillez saisir le stock d'alerte !")
     */
    private $stockalerte;

    /**
     * @ORM\Column(type="text", nullable=true)

     */
    private $description;

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

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Gedmo\Slug(fields={"designation"})
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tarifcategorieclt", mappedBy="produit", orphanRemoval=true)
     */
    private $tarifcategorieclts;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categprod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prixventeconseiller;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commander", mappedBy="produit")
     */
    private $commanders;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $img;

    public function __construct()
    {
        $this->tarifcategorieclts = new ArrayCollection();
        $this->commanders = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

   /* public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }*/

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getPrixU(): ?int
    {
        return $this->prixU;
    }

    public function setPrixU(int $prixU): self
    {
        $this->prixU = $prixU;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
    public function __toString()
    {
        return $this->reference;
        // TODO: Implement __toString() method.
    }

    /**
     * @return Collection|Tarifcategorieclt[]
     */
    public function getTarifcategorieclts(): Collection
    {
        return $this->tarifcategorieclts;
    }

    public function addTarifcategorieclt(Tarifcategorieclt $tarifcategorieclt): self
    {
        if (!$this->tarifcategorieclts->contains($tarifcategorieclt)) {
            $this->tarifcategorieclts[] = $tarifcategorieclt;
            $tarifcategorieclt->setProduit($this);
        }

        return $this;
    }

    public function removeTarifcategorieclt(Tarifcategorieclt $tarifcategorieclt): self
    {
        if ($this->tarifcategorieclts->contains($tarifcategorieclt)) {
            $this->tarifcategorieclts->removeElement($tarifcategorieclt);
            // set the owning side to null (unless already changed)
            if ($tarifcategorieclt->getProduit() === $this) {
                $tarifcategorieclt->setProduit(null);
            }
        }

        return $this;
    }

    public function getCategprod(): ?string
    {
        return $this->categprod;
    }

    public function setCategprod(string $categprod): self
    {
        $this->categprod = $categprod;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getPrixventeconseiller(): ?string
    {
        return $this->prixventeconseiller;
    }

    public function setPrixventeconseiller(string $prixventeconseiller): self
    {
        $this->prixventeconseiller = $prixventeconseiller;

        return $this;
    }

    /**
     * @return Collection|Commander[]
     */
    public function getCommanders(): Collection
    {
        return $this->commanders;
    }

    public function addCommander(Commander $commander): self
    {
        if (!$this->commanders->contains($commander)) {
            $this->commanders[] = $commander;
            $commander->setProduit($this);
        }

        return $this;
    }

    public function removeCommander(Commander $commander): self
    {
        if ($this->commanders->contains($commander)) {
            $this->commanders->removeElement($commander);
            // set the owning side to null (unless already changed)
            if ($commander->getProduit() === $this) {
                $commander->setProduit(null);
            }
        }

        return $this;
    }

    public function getStockalerte(): ?int
    {
        return $this->stockalerte;
    }

    public function setStockalerte(int $stockalerte): self
    {
        $this->stockalerte = $stockalerte;

        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img): self
    {
        $this->img = $img;

        return $this;
    }


}
