<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $date = null;

    #[ORM\Column]
    private ?int $h_depart = null;

    #[ORM\Column]
    private ?int $h_fin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getHDepart(): ?int
    {
        return $this->h_depart;
    }

    public function setHDepart(int $h_depart): static
    {
        $this->h_depart = $h_depart;

        return $this;
    }

    public function getHFin(): ?int
    {
        return $this->h_fin;
    }

    public function setHFin(int $h_fin): static
    {
        $this->h_fin = $h_fin;

        return $this;
    }
}
