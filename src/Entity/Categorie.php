<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"libelle"}, message="Ce libellé existe déjà")
 */
class Categorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez saisir le libellé !")
     */
    private $libelle;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Client", mappedBy="categorie")
     */
    private $clients;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tarifcategorieclt", mappedBy="categorie", orphanRemoval=true)
     */
    private $tarifcategorieclts;

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

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->tarifcategorieclts = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setCategorie($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->contains($client)) {
            $this->clients->removeElement($client);
            // set the owning side to null (unless already changed)
            if ($client->getCategorie() === $this) {
                $client->setCategorie(null);
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
            $tarifcategorieclt->setCategorie($this);
        }

        return $this;
    }

    public function removeTarifcategorieclt(Tarifcategorieclt $tarifcategorieclt): self
    {
        if ($this->tarifcategorieclts->contains($tarifcategorieclt)) {
            $this->tarifcategorieclts->removeElement($tarifcategorieclt);
            // set the owning side to null (unless already changed)
            if ($tarifcategorieclt->getCategorie() === $this) {
                $tarifcategorieclt->setCategorie(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->libelle;
        // TODO: Implement __toString() method.
    }

}
