<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function Add(string $numbers): int
    {
        if (empty($numbers)){
            return 0;
        }
        if (str_contains($numbers, ',')){
            $numbers = array_sum(explode(',',str_replace("\n", '', $numbers)));
        }
        return $numbers;
    }
}