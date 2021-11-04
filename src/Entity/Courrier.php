<?php

namespace App\Entity;

use App\Repository\CourrierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourrierRepository::class)
 */
class Courrier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Destinataire::class, inversedBy="courriers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destinataire;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="courriers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $refAnnonce;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objet;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateModification;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEnvoi;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRelance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nosRef;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vosRef;

    /**
     * @ORM\Column(type="text")
     */
    private $paragrapheJe;

    /**
     * @ORM\Column(type="text")
     */
    private $paragrapheVous;

    /**
     * @ORM\Column(type="text")
     */
    private $paragrapheNous;

    /**
     * @ORM\Column(type="text")
     */
    private $paragraphePolitesse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity=Suivi::class, mappedBy="courrier", orphanRemoval=true)
     */
    private $suivis;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $copieAnnonce;

    public function __construct()
    {
        $this->suivis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDestinataire(): ?Destinataire
    {
        return $this->destinataire;
    }

    public function setDestinataire(?Destinataire $destinataire): self
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getRefAnnonce(): ?string
    {
        return $this->refAnnonce;
    }

    public function setRefAnnonce(?string $refAnnonce): self
    {
        $this->refAnnonce = $refAnnonce;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(\DateTimeInterface $dateModification): self
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    public function getDateRelance(): ?\DateTimeInterface
    {
        return $this->dateRelance;
    }

    public function setDateRelance(?\DateTimeInterface $dateRelance): self
    {
        $this->dateRelance = $dateRelance;

        return $this;
    }

    public function getNosRef(): ?string
    {
        return $this->nosRef;
    }

    public function setNosRef(?string $nosRef): self
    {
        $this->nosRef = $nosRef;

        return $this;
    }

    public function getVosRef(): ?string
    {
        return $this->vosRef;
    }

    public function setVosRef(?string $vosRef): self
    {
        $this->vosRef = $vosRef;

        return $this;
    }

    public function getParagrapheJe(): ?string
    {
        return $this->paragrapheJe;
    }

    public function setParagrapheJe(string $paragrapheJe): self
    {
        $this->paragrapheJe = $paragrapheJe;

        return $this;
    }

    public function getParagrapheVous(): ?string
    {
        return $this->paragrapheVous;
    }

    public function setParagrapheVous(string $paragrapheVous): self
    {
        $this->paragrapheVous = $paragrapheVous;

        return $this;
    }

    public function getParagrapheNous(): ?string
    {
        return $this->paragrapheNous;
    }

    public function setParagrapheNous(string $paragrapheNous): self
    {
        $this->paragrapheNous = $paragrapheNous;

        return $this;
    }

    public function getParagraphePolitesse(): ?string
    {
        return $this->paragraphePolitesse;
    }

    public function setParagraphePolitesse(string $paragraphePolitesse): self
    {
        $this->paragraphePolitesse = $paragraphePolitesse;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|Suivi[]
     */
    public function getSuivis(): Collection
    {
        return $this->suivis;
    }

    public function addSuivi(Suivi $suivi): self
    {
        if (!$this->suivis->contains($suivi)) {
            $this->suivis[] = $suivi;
            $suivi->setCourrier($this);
        }

        return $this;
    }

    public function removeSuivi(Suivi $suivi): self
    {
        if ($this->suivis->removeElement($suivi)) {
            // set the owning side to null (unless already changed)
            if ($suivi->getCourrier() === $this) {
                $suivi->setCourrier(null);
            }
        }

        return $this;
    }

    public function getCopieAnnonce(): ?string
    {
        return $this->copieAnnonce;
    }

    public function setCopieAnnonce(?string $copieAnnonce): self
    {
        $this->copieAnnonce = $copieAnnonce;

        return $this;
    }
}
