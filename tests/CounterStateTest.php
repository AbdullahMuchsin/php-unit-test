<?php

namespace AbdullahMuchsin\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterStateTest extends TestCase
{

    private static Counter $counter;

    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
    }

    public function testFirst()
    {
        self::$counter->increment();
        Assert::assertEquals(1, self::$counter->getCounter());
    }

    public function testSecound()
    {
        self::$counter->increment();
        Assert::assertEquals(2, self::$counter->getCounter());
    }

    /**
     * @afterClass
     */
    public static function afterClass()
    {
        echo "Akhir dari test case" . PHP_EOL;
    }
}
