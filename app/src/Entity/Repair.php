<?php

namespace App\Entity;

use App\Repository\RepairRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepairRepository::class)]
class Repair
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $car = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $reason = null;

    #[ORM\OneToOne(mappedBy: 'repair', cascade: ['persist', 'remove'])]
    private ?Result $result = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCar(): ?string
    {
        return $this->car;
    }

    public function setCar(string $car): self
    {
        $this->car = $car;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function getResult(): ?Result
    {
        return $this->result;
    }

    public function setResult(?Result $result): self
    {
        // unset the owning side of the relation if necessary
        if ($result === null && $this->result !== null) {
            $this->result->setRepair(null);
        }

        // set the owning side of the relation if necessary
        if ($result !== null && $result->getRepair() !== $this) {
            $result->setRepair($this);
        }

        $this->result = $result;

        return $this;
    }
}
