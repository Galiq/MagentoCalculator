<?php
declare(strict_types=1);

namespace Galik\Calculator\Model\Data;

use Galik\Calculator\Api\Data\CalculatorResultInterface;

class CalculatorResult implements CalculatorResultInterface
{
    /**
     * @var float
     */
    protected $result;

    /**
     * @var string
     */
    protected $status;

    /**
     * @param float $result
     * @param int $precision
     */
    public function setResult(float $result, int $precision): void
    {
        $this->result = round($result, $precision);
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getResult(): float
    {
        return $this->result;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
