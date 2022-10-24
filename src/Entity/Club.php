<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $createdat = null;

    #[ORM\ManyToMany(targetEntity: Student::class, mappedBy: 'list_club')]
    private Collection $list_students;

    public function __construct()
    {
        $this->list_students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getListStudents(): Collection
    {
        return $this->list_students;
    }

    public function addListStudent(Student $listStudent): self
    {
        if (!$this->list_students->contains($listStudent)) {
            $this->list_students->add($listStudent);
            $listStudent->addListClub($this);
        }

        return $this;
    }

    public function removeListStudent(Student $listStudent): self
    {
        if ($this->list_students->removeElement($listStudent)) {
            $listStudent->removeListClub($this);
        }

        return $this;
    }
}
