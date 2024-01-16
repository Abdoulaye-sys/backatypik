<?php

namespace App\Entity;

use App\Repository\LogementRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: LogementRepository::class)]
#[ApiResource()]


class Logement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?string $type_logement = null;


    #[ORM\Column]
    private ?int $capacity = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombre_chambres = null;
    
    #[ORM\Column(nullable: true)]
    private ?int $nombre_lits = null;
    
    #[ORM\Column(nullable: true)]
    private ?string $prix_nuit = null;
    
    #[ORM\Column(type: 'string', length: 255)]
    #[Vich\UploadableField(mapping: 'logement_images', fileNameProperty: 'image')]   
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTypeLogement(): ?string
    {
        return $this->type_logement;
    }

    public function setTypeLogement(string $type_logement): static
    {
        $this->type_logement = $type_logement;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getNombreChambres(): ?int
    {
        return $this->nombre_chambres;
    }

    public function setNombreChambres(int $nombre_chambres): static
    {
        $this->nombre_chambres = $nombre_chambres;

        return $this;
    }

    public function getNombreLits(): ?int
    {
        return $this->nombre_lits;
    }

    public function setNombreLits(int $nombre_lits): static
    {
        $this->nombre_lits = $nombre_lits;

        return $this;
    }

    public function getPrixNuit(): ?string
    {
        return $this->prix_nuit;
    }

    public function setPrixNuit(string $prix_nuit): static
    {
        $this->prix_nuit = $prix_nuit;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): static
    {
        $this->image = $image;

        return $this;
    }
}
