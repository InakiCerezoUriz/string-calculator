<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    private StringCalculator $stringCalculator;
    protected function setUp(): void
    {
        parent::setUp();

        $this->stringCalculator = new StringCalculator();

    }

    /**
     * @test
     */
    public function givenNoNumbersToAddReturnsZero(): void
    {
        $this->assertEquals(0, $this->stringCalculator->Add(""));
    }

    /**
     * @test
     */
    public function givenSingleNumberReturnsSameNumber(): void
    {
        $this->assertEquals(1, $this->stringCalculator->Add("1"));
    }

    /**
     * @test
     */
    public function givenNumbersReturnsSumOfNumbers(): void
    {
        $this->assertEquals(6, $this->stringCalculator->Add("1,2,3"));
    }

    /**
     * @test
     */
    public function givenNumberSeparatedByCommasAndLineBreakReturnsSumOfNumbers(): void
    {
        $this->assertEquals(6, $this->stringCalculator->Add("1,\n2,3"));
    }



}