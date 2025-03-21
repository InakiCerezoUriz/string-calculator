<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function givenNoNumbersToAddReturnsZero(): void
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->Add('');

        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function givenSingleNumberReturnsSameNumber(): void
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->Add('1');

        $this->assertEquals(1, $result);
    }


}