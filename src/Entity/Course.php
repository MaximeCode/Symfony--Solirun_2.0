<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Tours>
     */
    #[ORM\OneToMany(targetEntity: Tours::class, mappedBy: 'laCourse')]
    private Collection $lesCourses;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    public function __construct()
    {
        $this->lesCourses = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Tours>
     */
    public function getLesCourses(): Collection
    {
        return $this->lesCourses;
    }

    public function addLesCourse(Tours $lesCourse): static
    {
        if (!$this->lesCourses->contains($lesCourse)) {
            $this->lesCourses->add($lesCourse);
            $lesCourse->setLaCourse($this);
        }

        return $this;
    }

    public function removeLesCourse(Tours $lesCourse): static
    {
        if ($this->lesCourses->removeElement($lesCourse)) {
            // set the owning side to null (unless already changed)
            if ($lesCourse->getLaCourse() === $this) {
                $lesCourse->setLaCourse(null);
            }
        }

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
}
