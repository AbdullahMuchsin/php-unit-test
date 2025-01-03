<?php

namespace AbdullahMuchsin\Test;

interface ProductRepository
{
    public function save(Product $product): Product;
    public function delete(Product $product): void;
    public function findById(String $id): ?Product;
    public function findAll(): array;
}
