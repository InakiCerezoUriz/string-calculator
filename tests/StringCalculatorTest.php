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

    /**
     * @test
     */
    public function givenDelimitationSymbolAndNumbersReturnsSumOfNumbers(): void
    {
        $this->assertEquals(6, $this->stringCalculator->Add("//;\n1;2;3"));
    }

    /**
     * @test
     */
    public function givenDelimitationSymbolNumbersAndBreakLineReturnsSumOfNumbers(): void
    {
        $this->assertEquals(6, $this->stringCalculator->Add("//;\n1;\n2;\n3"));
    }

    /**
     * @test
     */
    public function givenSingleNegativeNumberExpectException(): void
    {
        $this->expectException(\Exception::class);
        $this->stringCalculator->Add("-1");
    }

    /**
     * @test
     */
    public function givenSingleNegativeNumberExpectExceptionMessage(): void
    {
        $this->expectExceptionMessage("negativos no soportados -1");
        $this->stringCalculator->Add("-1");
    }

    /**
     * @test
     */
    public function givenNumbersWithSingleNegativeNumberExpectException(): void
    {
        $this->expectException(\Exception::class);
        $this->stringCalculator->Add("1,-1");
    }

    /**
     * @test
     */
    public function givenNumbersWithSingleNegativeNumberExpectExceptionMessage(): void
    {
        $this->expectExceptionMessage("negativos no soportados -1");
        $this->stringCalculator->Add("1,-1");
    }


    /**
     * @test
     */
    public function givenNumbersWithMultipleNegativeNumbersExpectException(): void
    {
        $this->expectException(\Exception::class);
        $this->stringCalculator->Add("1,-1,2,-2,-4");
    }

    /**
     * @test
     */
    public function givenNumbersWithMultipleNegativeNumbersExpectExceptionMessage(): void
    {
        $this->expectExceptionMessage("negativos no soportados -1, -2");
        $this->stringCalculator->Add("1,-1,2,-2");
    }


    /**
     * @test
     */
    public function givenNumbersWithMultipleNegativeNumbersAndLineBreakExpectException(): void
    {
        $this->expectException(\Exception::class);
        $this->stringCalculator->Add("1,-1,\n2,-2,-4");
    }

    /**
     * @test
     */
    public function givenNumbersWithMultipleNegativeNumbersAndLineBreakExpectExceptionMessage(): void
    {
        $this->expectExceptionMessage("negativos no soportados -1, -2, -4");
        $this->stringCalculator->Add("1,\n-1,\n2,\n-2,-4");
    }

    /**
     * @test
     */
    public function givenSingleNumberBiggerThan1000ReturnsZero(): void
    {
        $this->assertEquals(0, $this->stringCalculator->Add("1001"));
    }

    /**
     * @test
     */
    public function givenNumbersWithSomeNumbersBiggerThan1000ReturnsSumOfNumbersSmallerThan1000(): void
    {
        $this->assertEquals(6, $this->stringCalculator->Add("1,2,1001,3,1005"));
    }

    /**
     * @test
     */
    public function givenDelimitationSymbolOfAnyLengthAndNumbersReturnsSumOfNumbers(): void
    {
        $this->assertEquals(6, $this->stringCalculator->Add("//[***]\n1***2***3"));
    }

    /**
     * @test
     */
    public function givenDelimitationSymbolOfAnyLengthNumbersAndLineBreakReturnsSumOfNumbers(): void
    {
        $this->assertEquals(6, $this->stringCalculator->Add("//[***]\n1***\n2***\n3"));
    }

    /**
     * @test
     */
    public function givenDelimitationSymbolOfAnyLengthAndNumbersWithNegativeNumbersReturnsException(): void
    {
        $this->expectException(\Exception::class);
        $this->stringCalculator->Add("//[***]\n-1***2***-3");
    }

    /**
     * @test
     */
    public function givenDelimitationSymbolOfAnyLengthAndNumbersWithNumbersBiggerThan1000ReturnsSumOfNumbersSmallerThan1000()
    {
        $this->assertEquals(6, $this->stringCalculator->Add("//[***]\n1***2***1001***3***1005"));
    }

}