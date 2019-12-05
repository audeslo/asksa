<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockshowroomRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Stockshowroom
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
    private $referencecarton;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $referencebidon;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ouvert;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vendu;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixdevente;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commandershow", inversedBy="stockshowrooms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Commandershow;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Gedmo\Slug(fields={"referencecarton","referencebidon"})
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdOn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
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
     * @ORM\Column(type="boolean")
     */
    private $sync;

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

    public function getReferencecarton(): ?string
    {
        return $this->referencecarton;
    }

    public function setReferencecarton(string $referencecarton): self
    {
        $this->referencecarton = $referencecarton;

        return $this;
    }

    public function getOuvert(): ?bool
    {
        return $this->ouvert;
    }

    public function setOuvert(bool $ouvert): self
    {
        $this->ouvert = $ouvert;

        return $this;
    }

    public function getVendu(): ?bool
    {
        return $this->vendu;
    }

    public function setVendu(bool $vendu): self
    {
        $this->vendu = $vendu;

        return $this;
    }

    public function getPrixdevente(): ?int
    {
        return $this->prixdevente;
    }

    public function setPrixdevente(int $prixdevente): self
    {
        $this->prixdevente = $prixdevente;

        return $this;
    }

    public function getCommandershow(): ?Commandershow
    {
        return $this->Commandershow;
    }

    public function setCommandershow(?Commandershow $Commandershow): self
    {
        $this->Commandershow = $Commandershow;

        return $this;
    }

    public function getReferencebidon(): ?string
    {
        return $this->referencebidon;
    }

    public function setReferencebidon(string $referencebidon): self
    {
        $this->referencebidon = $referencebidon;

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

    public function getSync(): ?bool
    {
        return $this->sync;
    }

    public function setSync(bool $sync): self
    {
        $this->sync = $sync;

        return $this;
    }
}
