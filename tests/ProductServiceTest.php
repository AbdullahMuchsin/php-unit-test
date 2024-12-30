<?php

namespace AbdullahMuchsin\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{

    private ProductService $productService;
    private ProductRepository $productRepository;

    protected function setUp(): void
    {
        $this->productRepository = $this->createStub(ProductRepository::class);
        $this->productService = new ProductService($this->productRepository);
    }

    public function testStub()
    {
        $product = new Product();
        $product->setId("1");

        $this->productRepository->method("findById")->willReturn($product);

        Assert::assertSame($product, $this->productRepository->findById("1"));
    }

    public function testStubMap()
    {
        $product1 = new Product();
        $product1->setId("1");

        $product2 = new Product();
        $product2->setId("2");

        $map = [
            ["1", $product1],
            ["2", $product2],
        ];


        $this->productRepository->method("findById")->willReturnMap($map);

        Assert::assertSame($product1, $this->productRepository->findById("1"));
        Assert::assertSame($product2, $this->productRepository->findById("2"));
    }

    public function testStubCallback()
    {
        $this->productRepository->method("findById")->willReturnCallback(function (string $id) {
            $product = new Product();
            $product->setId($id);

            return $product;
        });

        Assert::assertEquals("1", $this->productRepository->findById("1")->getId());
        Assert::assertEquals("2", $this->productRepository->findById("2")->getId());
        Assert::assertEquals("3", $this->productRepository->findById("3")->getId());
        Assert::assertEquals("4", $this->productRepository->findById("4")->getId());
    }
}
