<?php

namespace App\Entity;

use App\Repository\PossessionRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PossessionRepository::class)]
class Possession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[Groups(['possession'])]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\ManyToOne(inversedBy: 'user_possession')]
    #[Groups(['possession'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user_id = null;


    #[Groups(['possession'])]
    #[ORM\Column(length: 40)]
    private ?string $name = null;

    #[Groups(['possession'])]
    #[ORM\Column]
    private ?float $value = null;

    #[Groups(['possession'])]
    #[ORM\Column(length: 40)]
    private ?string $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    public function setUserId(?Users $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
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

    /**
     * Prix de revente de l'objet
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Type d'objet
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

}


