<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'Students')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classroom $classroom = null;

    #[ORM\ManyToMany(targetEntity: Club::class, inversedBy: 'list_students')]
    private Collection $list_club;

    public function __construct()
    {
        $this->list_club = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getClassroom(): ?Classroom
    {
        return $this->classroom;
    }

    public function setClassroom(?Classroom $classroom): self
    {
        $this->classroom = $classroom;

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getListClub(): Collection
    {
        return $this->list_club;
    }

    public function addListClub(Club $listClub): self
    {
        if (!$this->list_club->contains($listClub)) {
            $this->list_club->add($listClub);
        }

        return $this;
    }

    public function removeListClub(Club $listClub): self
    {
        $this->list_club->removeElement($listClub);

        return $this;
    }
}
