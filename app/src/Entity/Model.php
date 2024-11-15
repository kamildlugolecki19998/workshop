<?php

namespace App\Entity;

use App\Repository\ModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelRepository::class)]
class Model
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'models', targetEntity: SubModel::class)]
    private Collection $subModels;

    public function __construct()
    {
        $this->subModels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, SubModel>
     */
    public function getSubModels(): Collection
    {
        return $this->subModels;
    }

    public function addSubModel(SubModel $subModel): self
    {
        if (!$this->subModels->contains($subModel)) {
            $this->subModels->add($subModel);
        }

        return $this;
    }

    public function removeSubModel(SubModel $subModel): self
    {
        if ($this->subModels->contains($subModel)) {
            $this->subModels->removeElement($subModel);
        }

        return $this;
    }
}
