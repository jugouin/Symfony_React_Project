<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[Groups(['user'])]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['user'])]
    #[ORM\Column(length: 40)]
    private ?string $nom = null;

    #[Groups(['user'])]
    #[ORM\Column(length: 40)]
    private ?string $prenom = null;

    #[Groups(['user'])]
    #[ORM\Column(length: 40)]
    private ?string $adresse = null;

    #[Groups(['user'])]
    #[ORM\Column(length: 40)]
    private ?string $email = null;

    #[Groups(['user'])]
    #[ORM\Column(length: 40)]
    private ?string $tel = null;

    #[Groups(['user'])]
    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthDate = null;

    #[Groups(['user'])]
    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Possession::class)]
    private Collection $user_possessions;

    #[Groups(['user'])]
    private ?int $age = 0;

    public function __construct()
    {
        $this->user_possessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection<int, Possession>
     */
    public function getUserPossessions(): Collection
    {
        return $this->user_possessions;
    }

    public function addUserPossessions(Possession $userPossessions): static
    {
        if (!$this->user_possessions->contains($userPossessions)) {
            $this->user_possessions->add($userPossessions);
            $userPossessions->setUserId($this);
        }

        return $this;
    }

    public function removeUserPossession(Possession $userPossessions): static
    {
        if ($this->user_possessions->removeElement($userPossessions)) {
            // set the owning side to null (unless already changed)
            if ($userPossessions->getUserId() === $this) {
                $userPossessions->setUserId(null);
            }
        }

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getAge()
    {
        $date = new DateTime();
        $userBirthDate = $this->getBirthDate();
        $age = date_diff($userBirthDate, $date);
        return $age->format('%y');

        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }
}
