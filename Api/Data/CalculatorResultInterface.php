<?php
declare(strict_types=1);

namespace Galik\Calculator\Api\Data;

interface CalculatorResultInterface
{

    /**
     * @return float
     */
    public function getResult(): float;

    /**
     * @return string
     */
    public function getStatus(): string;
}
