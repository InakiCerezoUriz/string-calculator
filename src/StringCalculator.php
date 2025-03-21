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
            $delimiter = $numbers[2];
            $numbers = substr($numbers, 4);
        }
        if (str_contains($numbers, $delimiter)) {
            $numbers = explode($delimiter, str_replace("\n", '', $numbers));

            $negativeNumbers = [];
            foreach ($numbers as $num) {
                if ($num < 0){
                    $negativeNumbers[] = $num;
                }
            }
            if (!empty($negativeNumbers)){
                throw new \Exception('negativos no soportados '.implode(', ', $negativeNumbers));
            }

            $numbers = array_sum($numbers);
        }
        return $numbers;
    }
}