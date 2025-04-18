<?php

namespace App\Entity;

use App\Repository\TasksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TasksRepository::class)]
class Tasks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    // #[Assert\Length(
    //     min: 4,
    //     max: 20,
    //     minMessage: "Le champ Nom doit contenir au moins 4 caractères",
    //     maxMessage: "Le champ Nom doit contenir au maximum 20 caractères"
    // )]
    // #[Assert\Regex(
    //     pattern: "/^[\p{L}0-9 '-]+$/u",
    //     message: "Interdiction d'utiliser des caractères spéciaux"
    // )]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    // #[Assert\Length(
    //     min: 10,
    //     max: 100,
    //     minMessage: "Le champ Nom doit contenir au moins 10 caractères",
    //     maxMessage: "Le champ Nom doit contenir au maximum 100 caractères"
    // )]
    // #[Assert\Regex(
    //     pattern: "/^[\p{L}0-9 '-]+$/u",
    //     message: "Interdiction d'utiliser des caractères spéciaux"
    // )]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
