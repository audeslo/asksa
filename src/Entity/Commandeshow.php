<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeshowRepository")
 */
class Commandeshow
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
    private $intituleshow;

    /**
     * @ORM\Column(type="date")
     */
    private $datecomshow;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fournisseurshow;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Gedmo\Slug(fields={"intituleshow"})
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $editedOn;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $creditedOn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $editedBy;

    public function __construct()
    {
        $this->setDatecomshow(new \DateTime('now'));
    }

    /**
     * @ORM\PrePersist()
     */
    public function datecreated()
    {
        $this->setCreditedOn(new \DateTime('now'));
    }

    /**
     * @ORM\PreUpdate()
     */
    public function dateupdated()
    {
        $this->setEditedOn(new \DateTime('now'));
    }


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Showroom")
     * @ORM\JoinColumn(nullable=false)
     */
    private $showroom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntituleshow(): ?string
    {
        return $this->intituleshow;
    }

    public function setIntituleshow(string $intituleshow): self
    {
        $this->intituleshow = $intituleshow;

        return $this;
    }

    public function getDatecomshow(): ?\DateTimeInterface
    {
        return $this->datecomshow;
    }

    public function setDatecomshow(\DateTimeInterface $datecomshow): self
    {
        $this->datecomshow = $datecomshow;

        return $this;
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

    public function getFournisseurshow(): ?string
    {
        return $this->fournisseurshow;
    }

    public function setFournisseurshow(string $fournisseurshow): self
    {
        $this->fournisseurshow = $fournisseurshow;

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

    public function getCreditedOn(): ?\DateTimeInterface
    {
        return $this->creditedOn;
    }

    public function setCreditedOn(\DateTimeInterface $creditedOn): self
    {
        $this->creditedOn = $creditedOn;

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

    public function __toString()
    {
        return $this->intituleshow;
        // TODO: Implement __toString() method.
    }

    public function getShowroom(): ?Showroom
    {
        return $this->showroom;
    }

    public function setShowroom(?Showroom $showroom): self
    {
        $this->showroom = $showroom;

        return $this;
    }


    /*
     * @return Collection|Commandershow[]
     */
    /*   public function getCommandershows(): Collection
       {
           return $this->commandershows;
       }


       public function addCommander(Commandershow $commandershow): self
       {
           if (!$this->commandershows->contains($commandershow)) {
               $this->commandershows[] = $commandershow;
               $commandershow->setCommande($this);
           }

           return $this;
       }

       public function removeCommandershow(Commandershow $commandershow): self
       {
           if ($this->commandershows->contains($commandershow)) {
               $this->commandershows->removeElement($commandershow);
               // set the owning side to null (unless already changed)
               if ($commandershow->getCommande() === $this) {
                   $commandershow->setCommande(NULL);
               }
           }

           return $this;
       }*/

}
