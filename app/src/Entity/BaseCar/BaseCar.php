<?php

namespace App\Entity\BaseCar;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class BaseCar
{
    private Serializer $serializer;
    private string $brand;

    private string $model;

    private string $subModel;

    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    public function setBrandName(string $name): void
    {
        $this->brand = $name;
    }

    public function getBrandName(): string
    {
        return $this->brand;
    }

    public function setModelName(string $name): void
    {
        $this->model = $name;
    }

    public function getModelName(): string
    {
        return $this->model;
    }

    public function setSubModelName(string $name): void
    {
        $this->subModel = $name;
    }

    public function getSubModelName(): string
    {
        return $this->subModel;
    }

    public function serialize(): string
    {
       return $this->serializer->serialize($this, 'json');
    }

    public function createFromJson(string $baseCar): self
    {
        return $this->serializer->deserialize($baseCar, $this::class, 'json');
    }
}
