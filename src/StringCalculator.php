<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function Add(string $numbers): int
    {
        if (empty($numbers)){
            return 0;
        }
        $delimiter = ',';
        if (($negativeNumber = strpos($numbers, '-')) !== false){
            throw new \Exception('negativos no soportados -'. $numbers[$negativeNumber+1]);
        }
        if (str_starts_with($numbers, '//')) {
            $delimiter = $numbers[2];
            $numbers = substr($numbers, 4);
        }
        if (str_contains($numbers, $delimiter)) {
            $numbers = array_sum(explode($delimiter, str_replace("\n", '', $numbers)));
        }
        return $numbers;
    }
}