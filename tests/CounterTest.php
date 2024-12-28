<?php

namespace AbdullahMuchsin\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{

    private Counter $counter;

    public function setUp(): void
    {
        $this->counter = new Counter();
        echo "Test Counter" . PHP_EOL;
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
}
