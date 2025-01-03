<?php

namespace AbdullahMuchsin\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\CodeCoverage\Report\PHP;

class CounterTest extends TestCase
{

    private Counter $counter;

    public function setUp(): void
    {
        $this->counter = new Counter();
        echo "Test Counter" . PHP_EOL;
    }

    public function testIncrement()
    {
        Assert::assertEquals(0, $this->counter->getCounter());
        Assert::markTestIncomplete("TODO has not increment");
    }

    public function testCounter()
    {
        $this->counter->increment();

        Assert::assertEquals(1, $this->counter->getCounter());
    }

    public function testShowCounter()
    {

        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());
        $this->counter->increment();
        $this->assertEquals(2, $this->counter->getCounter());
        $this->counter->increment();
        self::assertEquals(3, $this->counter->getCounter());
        $this->counter->increment();
        Assert::assertEquals(4, $this->counter->getCounter());
    }

    /**
     * @test
     */
    public function increment()
    {
        Assert::markTestSkipped("Kode masih dalam tahap pengembangan");
        $this->counter->increment();
        self::assertEquals(1, $this->counter->getCounter());
    }

    public function testFirst(): Counter
    {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());

        return $this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecound(Counter $counter): void
    {
        $counter->increment();
        Assert::assertEquals(2, $counter->getCounter());
    }

    public function tearDown(): void
    {
        echo "Tear Down" . PHP_EOL;
    }

    /**
     * @after
     */
    public function after()
    {
        echo "After" . PHP_EOL;
    }

    /**
     * @requires OSFAMILY Windows
     * @requires PHP >= 7
     */
    public function testOnlyOnWindows()
    {
        Assert::assertEquals(true,  PHP_EOL . "Test Case only windows device" . PHP_EOL);
    }

    /**
     * @requires OSFAMILY Darwin
     */
    public function testOnlyOnMacOs()
    {
        Assert::assertEquals(true, PHP_EOL . "Test Case only macOS device");
    }
}
