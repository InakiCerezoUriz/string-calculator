<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function Add(string $numbers): int
    {
        if ($numbers === ''){
            return 0;
        }
        return intval($numbers);
    }
}