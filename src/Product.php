<?php

namespace AbdullahMuchsin\Test;

class Product
{

    private String $id, $name, $description;
    private int $price, $quantity;

    public function setId(String $id): void
    {
        $this->id = $id;
    }
    public function getId(): String
    {
        return $this->id;
    }

    public function setName(String $name): void
    {
        $this->name = $name;
    }
    public function getName(): String
    {
        return $this->name;
    }

    public function setDescription(String $description): void
    {
        $this->description = $description;
    }
    public function getDescription(): String
    {
        return $this->description;
    }

    public function setPrice(String $price): void
    {
        $this->price = $price;
    }
    public function getPrice(): String
    {
        return $this->price;
    }

    public function setQuantity(String $quantity): void
    {
        $this->quantity = $quantity;
    }
    public function getQuantity(): String
    {
        return $this->quantity;
    }
}
