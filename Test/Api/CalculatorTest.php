<?php

namespace Galik\Calculator\Test;

use Magento\Framework\Webapi\Rest\Request;
use Magento\TestFramework\TestCase\WebapiAbstract;

class CalculatorTest extends WebapiAbstract
{
    
    private $serviceInfo = [
        'rest' => [
            'resourcePath' => '/V1/api/rce/calculator',
            'httpMethod' => Request::HTTP_METHOD_POST,
        ]
    ];

    public function testCalculateAddOk()
    {
        $requestData = [
            "firstNumber" => "2.25",
            "secondNumber" => 1.75,
            "operator" => "add"
        ];
        $result = $this->_webApiCall($this->serviceInfo, $requestData);
        $expected = [
            "result" => 4,
            "status" => "OK"
        ];
        $this->assertEquals($expected, $result, "Result OK");
    }

    public function testCalculateSubtractOk()
    {
        $requestData = [
            "firstNumber" => "2.95",
            "secondNumber" => 1.755,
            "operator" => "subtract",
            "precision" => 3
        ];
        $result = $this->_webApiCall($this->serviceInfo, $requestData);
        $expected = [
            "result" => 1.195,
            "status" => "OK"
        ];
        $this->assertEquals($expected, $result, "Result OK");
    }

    public function testCalculateMultiplyOk()
    {
        $requestData = [
            "firstNumber" => "3",
            "secondNumber" => 5,
            "operator" => "multiply"
        ];
        $result = $this->_webApiCall($this->serviceInfo, $requestData);
        $expected = [
            "result" => 15,
            "status" => "OK"
        ];
        $this->assertEquals($expected, $result, "Result OK");
    }

    public function testCalculateDivideOk()
    {
        $requestData = [
            "firstNumber" => "1.25",
            "secondNumber" => 5.5,
            "operator" => "divide",
            "precision" => 5
        ];
        $result = $this->_webApiCall($this->serviceInfo, $requestData);
        $expected = [
            "result" => 0.22727,
            "status" => "OK"
        ];
        $this->assertEquals($expected, $result, "Result OK");
    }

    public function testCalculatePowerOk()
    {
        $requestData = [
            "firstNumber" => "1.25",
            "secondNumber" => 5.5,
            "operator" => "power",
            "precision" => 2
        ];
        $result = $this->_webApiCall($this->serviceInfo, $requestData);
        $expected = [
            "result" => 3.41,
            "status" => "OK"
        ];
        $this->assertEquals($expected, $result, "Result OK");
    }

    public function testCalculateDivideByZeroExceptionCaught()
    {
        $requestData = [
            "firstNumber" => "1.25",
            "secondNumber" => 0,
            "operator" => "divide",
            "precision" => 2
        ];
        $result = $this->_webApiCall($this->serviceInfo, $requestData);
        $expected = [
            "result" => 0,
            "status" => "Exception: You can't divide by Zero!"
        ];
        $this->assertEquals($expected, $result, "Exception");
    }

    public function testCalculateMissingParameterException()
    {
        $requestData = [
            "firstNumber" => "1.25",
            "operator" => "add",
            "precision" => 2
        ];
        $this->expectException(\Exception::class);
        $result = $this->_webApiCall($this->serviceInfo, $requestData);
        $expected = [
            "fieldName" => "secondNumber",
        ];
        $this->assertEquals($expected, $result['parameters'], "Exception");
    }
}
