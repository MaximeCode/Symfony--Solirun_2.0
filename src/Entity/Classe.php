<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Tours>
     */
    #[ORM\OneToMany(targetEntity: Tours::class, mappedBy: 'laClasse')]
    private Collection $lesClasses;

    /**
     * @var Collection<int, Users>
     */
    #[ORM\OneToMany(targetEntity: Users::class, mappedBy: 'classe')]
    private Collection $unUser;

    public function __construct()
    {
        $this->lesClasses = new ArrayCollection();
        $this->unUser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Tours>
     */
    public function getLesClasses(): Collection
    {
        return $this->lesClasses;
    }

    public function addLesClass(Tours $lesClass): static
    {
        if (!$this->lesClasses->contains($lesClass)) {
            $this->lesClasses->add($lesClass);
            $lesClass->setLaClasse($this);
        }

        return $this;
    }

    public function removeLesClass(Tours $lesClass): static
    {
        if ($this->lesClasses->removeElement($lesClass)) {
            // set the owning side to null (unless already changed)
            if ($lesClass->getLaClasse() === $this) {
                $lesClass->setLaClasse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getUnUser(): Collection
    {
        return $this->unUser;
    }

    public function addUnUser(Users $unUser): static
    {
        if (!$this->unUser->contains($unUser)) {
            $this->unUser->add($unUser);
            $unUser->setClasse($this);
        }

        return $this;
    }

    public function removeUnUser(Users $unUser): static
    {
        if ($this->unUser->removeElement($unUser)) {
            // set the owning side to null (unless already changed)
            if ($unUser->getClasse() === $this) {
                $unUser->setClasse(null);
            }
        }

        return $this;
    }
}
