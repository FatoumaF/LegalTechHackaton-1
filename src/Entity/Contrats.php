<?php
namespace App\Entity;

use App\Repository\ContratsRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: ContratsRepository::class)]
#[Vich\Uploadable]
class Contrats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $titre = '';

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $documentName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $marking = null; // Champ pour l'état du workflow

    #[Vich\UploadableField(mapping: 'contrat_file', fileNameProperty: 'documentName')]
    private ?File $contratFile = null; // Non persisté, utilisé pour l'upload

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $dateDebut;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $partiesImpliquees;

    #[ORM\Column(type: 'string', length: 50)]
    private string $statut;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[Vich\UploadableField(mapping: 'contrat_pdf', fileNameProperty: 'pdfName')]
    private ?File $pdfFile = null; // Non persisté, utilisé pour le fichier PDF

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $pdfName = null; // Stocke le nom du fichier PDF

    // Getters et Setters

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

    public function getDocumentName(): ?string
    {
        return $this->documentName;
    }

    public function setDocumentName(?string $documentName): self
    {
        $this->documentName = $documentName;
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

    public function getDateDebut(): \DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    public function getPartiesImpliquees(): ?string
    {
        return $this->partiesImpliquees;
    }

    public function setPartiesImpliquees(string $partiesImpliquees): self
    {
        $this->partiesImpliquees = $partiesImpliquees;
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

    public function setContratFile(?File $contratFile = null): void
    {
        $this->contratFile = $contratFile;

        if ($contratFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getContratFile(): ?File
    {
        return $this->contratFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getMarking(): ?string
    {
        return $this->marking;
    }

    public function setMarking(?string $marking): self
    {
        $this->marking = $marking;
        return $this;
    }

    // Getters et Setters pour le fichier PDF

    public function getPdfFile(): ?File
    {
        return $this->pdfFile;
    }

    public function setPdfFile(?File $pdfFile = null): void
    {
        $this->pdfFile = $pdfFile;

        if ($pdfFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getPdfName(): ?string
    {
        return $this->pdfName;
    }

    public function setPdfName(?string $pdfName): void
    {
        $this->pdfName = $pdfName;
    }
}
