<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function Add(string $numbers): int
    {
        if (empty($numbers) || $numbers > 1000){
            return 0;
        }

        if (strlen($numbers) == 2 && $numbers < 0){
            throw new \Exception('negativos no soportados '.$numbers);
        }

        $delimiter = ',';
        if (str_starts_with($numbers, '//')) {
            $breakLinePos = strpos($numbers, "\n");

            $delimiter = substr($numbers,2, $breakLinePos - 2);

            if (str_starts_with($delimiter, '[') && str_ends_with($delimiter, ']')){
                $delimiter = substr($delimiter,1,-1);
            }
            $numbers = substr($numbers, $breakLinePos + 1);
        }
        if (str_contains($numbers, $delimiter)) {
            $numbers = explode($delimiter, str_replace("\n", '', $numbers));

            $negativeNumbers = [];
            $validNumbers = [];
            foreach ($numbers as $num) {
                if ($num < 0){
                    $negativeNumbers[] = $num;
                }
                if ($num < 1000){
                    $validNumbers[] = $num;
                }
            }
            if (!empty($negativeNumbers)){
                throw new \Exception('negativos no soportados '.implode(', ', $negativeNumbers));
            }

            $numbers = array_sum($validNumbers);
        }
        return $numbers;
    }
}