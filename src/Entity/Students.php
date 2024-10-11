<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\StudentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentsRepository::class)]
#[ApiResource]
class Students
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $studentsName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentsName(): ?string
    {
        return $this->studentsName;
    }

    public function setStudentsName(string $studentsName): static
    {
        $this->studentsName = $studentsName;

        return $this;
    }
}
