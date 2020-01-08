<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CapaciteRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"code"}, message="Ce code existe déjà")
 */
class Capacite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull(message="Veuillez saisir le libellé !")
     */
    private $capacitecarton;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull(message="Veuillez saisir le libellé !")
     */
    private $capacitebidon;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
    * @ORM\Column(type="string", length=255, nullable=false)
    * @Gedmo\Slug(fields={"libelle"})
    */
    private $slug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdOn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     *
     */
    private $createdBy;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $editedOn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $editedBy;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Produit", mappedBy="capacite")
     */
    private $produits;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commander", mappedBy="capacite")
     */
    private $commanders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tarifcategorieclt", mappedBy="capacite")
     */
    private $tarifcategorieclts;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->commanders = new ArrayCollection();
        $this->tarifcategorieclts = new ArrayCollection();
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

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

    public function __toString()
    {
        return $this->code;
        // TODO: Implement __toString() method.
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

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->addCapacite($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->produits->removeElement($produit);
            $produit->removeCapacite($this);
        }

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
            $commander->setCapacite($this);
        }

        return $this;
    }

    public function removeCommander(Commander $commander): self
    {
        if ($this->commanders->contains($commander)) {
            $this->commanders->removeElement($commander);
            // set the owning side to null (unless already changed)
            if ($commander->getCapacite() === $this) {
                $commander->setCapacite(null);
            }
        }

        return $this;
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
            $tarifcategorieclt->setCapacite($this);
        }

        return $this;
    }

    public function removeTarifcategorieclt(Tarifcategorieclt $tarifcategorieclt): self
    {
        if ($this->tarifcategorieclts->contains($tarifcategorieclt)) {
            $this->tarifcategorieclts->removeElement($tarifcategorieclt);
            // set the owning side to null (unless already changed)
            if ($tarifcategorieclt->getCapacite() === $this) {
                $tarifcategorieclt->setCapacite(null);
            }
        }

        return $this;
    }
}
