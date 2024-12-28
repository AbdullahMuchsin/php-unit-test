<?php

namespace AbdullahMuchsin\Test;

use Exception;

class Person
{

    public function __construct(private string $name) {}

    public function sayHello(?string $name): string
    {
        if ($name == null) throw new Exception("Name is null");

        return "Hai $name, my name is $this->name" . PHP_EOL;
    }

    public function sayGoodBye(?string $name)
    {
        if ($name == null) throw new Exception("Name is null");

        echo "Good bye $name";
    }
}
