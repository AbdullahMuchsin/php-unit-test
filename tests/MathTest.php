<?php

namespace AbdullahMuchsin\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{

    public function testSum()
    {
        Assert::assertEquals(10, Math::sum([2, 2, 2, 2, 2]));
        Assert::assertEquals(30, Math::sum([10, 10, 10]));
        Assert::assertEquals(15, Math::sum([10, 5]));
        Assert::assertEquals(0, Math::sum([]));
        Assert::assertEquals(2, Math::sum([2]));
    }

    /**
     * @dataProvider dataMathSum
     */

    public function testDataProvider(array $values, int $expected)
    {
        Assert::assertEquals($expected, Math::sum($values));
    }

    public function dataMathSum(): array
    {
        return [
            [[10, 2, 5], 17],
            [[3, 5, 4], 12],
            [[], 0],
        ];
    }

    /**
     * @testWith [[10,10,10], 30]
     *           [[2,2,2], 6]
     *           [[2,62,2], 66]
     *           [[], 0]
     *           [[7], 7]
     */
    public function testWith(array $values, int $expected)
    {
        Assert::assertEquals($expected, Math::sum($values));
    }
}
