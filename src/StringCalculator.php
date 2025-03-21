<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function Add(string $numbers): int
    {
        if (empty($numbers)){
            return 0;
        }
        if (str_starts_with($numbers, '//')){
            $numbers = array_sum(explode($numbers[2],substr($numbers,4)));
        }
        if (str_contains($numbers, ',')){
            $numbers = array_sum(explode(',',str_replace("\n", '', $numbers)));
        }
        return $numbers;
    }
}