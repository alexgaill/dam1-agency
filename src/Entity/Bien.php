<?php

namespace App\Entity;

use App\Repository\BienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BienRepository::class)]
class Bien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    /**
     * 0 => Location, 
     * 1 => Vente
     *
     * @var boolean|null
     */
    private ?bool $transactionType = null;

    #[ORM\Column]
    private ?int $surface = null;

    #[ORM\Column(nullable: true)]
    private ?int $surfaceTerrain = null;

    #[ORM\Column]
    private ?int $nbPieces = null;

    #[ORM\Column(nullable: true)]
    private ?int $etage = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length:10)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 100)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateConstruction = null;

    #[ORM\OneToMany(mappedBy: 'bien', targetEntity: Option::class, orphanRemoval: true)]
    private Collection $options;

    #[ORM\Column]
    /**
     * 0 => Appartement
     * 1 => Maison
     *
     * @var integer|null
     */
    private ?int $typeBien = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $image = null;

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getTransactionType(): ?string
    {
        $types = [
            "A louer",
            "A vendre"
        ];
        return $types[$this->transactionType];
    }

    public function setTransactionType(bool $transactionType): self
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getSurfaceTerrain(): ?int
    {
        return $this->surfaceTerrain;
    }

    public function setSurfaceTerrain(?int $surfaceTerrain): self
    {
        $this->surfaceTerrain = $surfaceTerrain;

        return $this;
    }

    public function getNbPieces(): ?int
    {
        return $this->nbPieces;
    }

    public function setNbPieces(int $nbPieces): self
    {
        $this->nbPieces = $nbPieces;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(?int $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDateConstruction(): ?\DateTimeInterface
    {
        return $this->dateConstruction;
    }

    public function setDateConstruction(?\DateTimeInterface $dateConstruction): self
    {
        $this->dateConstruction = $dateConstruction;

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setBien($this);
        }

        return $this;
    }

    public function removeOption(Option $option): self
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getBien() === $this) {
                $option->setBien(null);
            }
        }

        return $this;
    }

    public function getTypeBien(): ?int
    {
        return $this->typeBien;
    }

    public function setTypeBien(int $typeBien): self
    {
        $this->typeBien = $typeBien;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
