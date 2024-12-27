<?php

namespace AbdullahMuchsin\Test;

class Math
{

    public static function sum(array $values): int
    {
        $number = 0;
        foreach ($values as $value) {
            $number += $value;
        }
        return $number;
    }
}
