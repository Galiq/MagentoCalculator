<?php
declare(strict_types=1);

namespace Galik\Calculator\Model;

use Galik\Calculator\Api\CalculatorInterface;
use Galik\Calculator\Api\Data\CalculatorResultInterface;
use Galik\Calculator\Exception\DivideByZeroException;
use Galik\Calculator\Model\Data\CalculatorResult;

class Calculator implements CalculatorInterface
{

    const OPERATOR_ADD = 'add';
    const OPERATOR_SUBTRACT = 'subtract';
    const OPERATOR_MULTIPLY = 'multiply';
    const OPERATOR_DIVIDE = 'divide';
    const OPERATOR_POWER = 'power';

    /**
     * @var CalculatorResult
     */
    protected $calculatorResult;

    public function __construct(CalculatorResult $calculatorResult)
    {
        $this->calculatorResult = $calculatorResult;
    }

    /**
     * @param string $firstNumber
     * @param string $secondNumber
     * @param string $operator
     * @param int $precision
     * @return CalculatorResultInterface
     */
    public function calculate(
        string $firstNumber,
        string $secondNumber,
        string $operator,
        int $precision = 2
    ): CalculatorResultInterface
    {
        $status = 'OK';

        try {
            switch ($operator) {
                case self::OPERATOR_ADD:
                    $result = $firstNumber + $secondNumber;
                    break;
                case self::OPERATOR_SUBTRACT:
                    $result = $firstNumber - $secondNumber;
                    break;
                case self::OPERATOR_MULTIPLY:
                    $result = $firstNumber * $secondNumber;
                    break;
                case self::OPERATOR_DIVIDE:
                    if ($secondNumber == 0) {
                        throw new DivideByZeroException("You can't divide by Zero!");
                    }
                    $result = $firstNumber / $secondNumber;
                    break;
                case self::OPERATOR_POWER:
                    $result = pow($firstNumber, $secondNumber);
                    break;
                default:
                    throw new \Exception("Operator not recognized. Available operators are: add, subtract, multiply, divide, power");
            }
        } catch (\Exception $exception) {
            $result = 0;
            $status = 'Exception: ' . $exception->getMessage();
        }

        $this->calculatorResult->setResult($result, $precision);
        $this->calculatorResult->setStatus($status);

        return $this->calculatorResult;
    }
}
