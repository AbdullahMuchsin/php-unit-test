<?php

namespace AbdullahMuchsin\Test;

use Exception;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

    public function testSuccess()
    {
        $person = new Person("Muchsin");
        Assert::assertEquals("Hai Budi, my name is Muchsin" . PHP_EOL, $person->sayHello("Budi"));
    }

    public function testException()
    {
        $person = new Person("Muchsin");
        $this->expectException(Exception::class);
        $person->sayHello(null);
    }

    public function testSuccessSayGoodBye()
    {
        $person = new Person("Muchsin");
        $this->expectOutputString("Good bye Budi");
        $person->sayGoodBye("Budi");
    }

    public function testExceptionSayGoodBye()
    {
        $person = new Person("Muchsin");
        $this->expectException(Exception::class);
        $person->sayGoodBye(null);
    }
}
