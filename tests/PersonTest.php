<?php

namespace AbdullahMuchsin\Test;

use Exception;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    private Person $person;

    public function setUp(): void {}

    /**
     * @before
     */
    public function setPerson(): void
    {
        $this->person = new Person("Muchsin");
    }

    public function testSuccess()
    {
        Assert::assertEquals("Hai Budi, my name is Muchsin" . PHP_EOL, $this->person->sayHello("Budi"));
    }

    public function testException()
    {
        $this->expectException(Exception::class);
        $this->person->sayHello(null);
    }

    public function testSuccessSayGoodBye()
    {
        $this->expectOutputString("Good bye Budi");
        $this->person->sayGoodBye("Budi");
    }

    public function testExceptionSayGoodBye()
    {
        $this->expectException(Exception::class);
        $this->person->sayGoodBye(null);
    }
}
