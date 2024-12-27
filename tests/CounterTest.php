<?php

namespace AbdullahMuchsin\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    public function testCounter()
    {
        $counter = new Counter();
        $counter->increment();

        Assert::assertEquals(1, $counter->getCounter());
    }

    public function testShowCounter()
    {
        $counter = new Counter();

        $counter->increment();
        Assert::assertEquals(1, $counter->getCounter());
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
        $counter->increment();
        self::assertEquals(5, $counter->getCounter());
        $counter->increment();
        Assert::assertEquals(4, $counter->getCounter());
    }

    /**
     * @test
     */
    public function increment()
    {
        $counter = new Counter();

        $counter->increment();
        self::assertEquals(1, $counter->getCounter());
    }
}
