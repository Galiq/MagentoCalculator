<?php
declare(strict_types=1);

namespace Galik\Calculator\Api;

interface CalculatorInterface
{

    /**
     * @param string $firstNumber
     * @param string $secondNumber
     * @param string $operator
     * @param int $precision
     * @return \Galik\Calculator\Api\Data\CalculatorResultInterface
     */
    public function calculate(
        string $firstNumber,
        string $secondNumber,
        string $operator,
        int $precision = 2
    ): \Galik\Calculator\Api\Data\CalculatorResultInterface;
}
