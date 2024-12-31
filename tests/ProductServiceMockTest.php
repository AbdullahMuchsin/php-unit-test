<?php

namespace AbdullahMuchsin\Test;

use Exception;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ProductServiceMockTest extends TestCase
{

    private ProductService $productService;
    private ProductRepository $productRepository;

    protected function setUp(): void
    {
        $this->productRepository = $this->createMock(ProductRepository::class);
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

    public function testRegisterSuccess()
    {
        $product = new Product();
        $product->setId("1");
        $product->setName("Budi");

        $this->productRepository->method("findById")->willReturn(null);
        $this->productRepository->method("save")->willReturnArgument(0);

        $result = $this->productService->register($product);

        Assert::assertEquals($product->getId(), $result->getId());
        Assert::assertEquals($product->getName(), $result->getName());
    }

    public function testRegisterException()
    {
        $this->expectException(Exception::class);

        $productInDB = new Product();
        $productInDB->setId("1");
        $productInDB->setName("Andi");

        $this->productRepository->method("findById")->willReturn($productInDB);

        $product = new Product();
        $product->setId("1");
        $product->setId("Andi");

        $this->productService->register($product);
    }

    public function testDeleteSuccess()
    {
        $product = new Product();
        $product->setId("1");

        $this->productRepository->expects($this->once())
            ->method("delete")
            ->with(self::equalTo($product));

        $this->productRepository->expects($this->once())
            ->method("findById")
            ->with(self::equalTo("1"))
            ->willReturn($product);

        $this->productService->delete("1");
        Assert::assertEquals(true, "Success delete");
    }

    public function testDeleteException()
    {

        $this->productRepository->expects($this->never())
            ->method("delete");

        $this->expectException(Exception::class);

        $this->productRepository->expects(self::once())
            ->method("findById")
            ->with("1")
            ->willReturn(null);

        $this->productService->delete("1");
    }

    public function testMock()
    {
        $product = new Product();
        $product->setId("1");

        $this->productRepository->expects($this->once())
            ->method("findById")
            ->willReturn($product);

        $result = $this->productRepository->findById("1");

        Assert::assertSame($product, $result);
    }
}
