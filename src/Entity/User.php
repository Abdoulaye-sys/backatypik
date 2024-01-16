<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource()]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $uname = null;

    #[ORM\Column(length: 255)]
    private ?string $uemail = null;

    #[ORM\Column(length: 255)]
    private ?string $uphone = null;

    #[ORM\Column(length: 255)]
    private ?string $upass = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUname(): ?string
    {
        return $this->uname;
    }

    public function setUname(string $uname): static
    {
        $this->uname = $uname;

        return $this;
    }

    public function getUemail(): ?string
    {
        return $this->uemail;
    }

    public function setUemail(string $uemail): static
    {
        $this->uemail = $uemail;

        return $this;
    }

    public function getUphone(): ?string
    {
        return $this->uphone;
    }

    public function setUphone(string $uphone): static
    {
        $this->uphone = $uphone;

        return $this;
    }

    public function getUpass(): ?string
    {
        return $this->upass;
    }

    public function setUpass(string $upass): static
    {
        $this->upass = $upass;

        return $this;
    }

}
