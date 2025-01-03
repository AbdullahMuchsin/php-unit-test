<?php

namespace AbdullahMuchsin\Test;

use Exception;

class ProductService
{

    // Cara lama

    // private ProductRepository $productRepository;

    // public function __construct(ProductRepository $productRepository)
    // {
    //     $this->productRepository = $productRepository;
    // }

    // Cara baru

    public function __construct(private ProductRepository $productRepository) {}

    public function register(Product $product): Product
    {
        if ($this->productRepository->findById($product->getId()) != null) {
            throw new Exception("Product is already exists");
        }

        return $this->productRepository->save($product);
    }

    public function delete(String $id)
    {

        $product = $this->productRepository->findById($id);

        if ($product == null) {
            throw new Exception("Product not found");
        }

        $this->productRepository->delete($product);
    }
}
