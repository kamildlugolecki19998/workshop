<?php

namespace App\Entity;

use App\Repository\DiagnosisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiagnosisRepository::class)]
class Diagnosis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Repair $repair = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $result = null;

    #[ORM\ManyToMany(targetEntity: Tag::class)]
    private Collection $name;

    public function __construct()
    {
        $this->name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepair(): ?Repair
    {
        return $this->repair;
    }

    public function setRepair(?Repair $repair): self
    {
        $this->repair = $repair;

        return $this;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(string $result): self
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getName(): Collection
    {
        return $this->name;
    }

    public function addName(Tag $name): self
    {
        if (!$this->name->contains($name)) {
            $this->name->add($name);
        }

        return $this;
    }

    public function removeName(Tag $name): self
    {
        $this->name->removeElement($name);

        return $this;
    }
}
