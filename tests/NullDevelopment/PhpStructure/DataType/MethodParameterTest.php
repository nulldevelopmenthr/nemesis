<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\PhpStructure\DataType;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\ContractName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\DataType\MethodParameter
 * @group  unit
 */
class MethodParameterTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $name;
    /** @var MockInterface|ContractName */
    private $contractName;
    /** @var bool */
    private $nullable;
    /** @var bool */
    private $hasDefaultValue;
    /** @var mixed */
    private $defaultValue;
    /** @var MethodParameter */
    private $sut;

    public function setUp()
    {
        $this->name            = 'name';
        $this->contractName    = new ClassName('User', 'MyCompany\\Webshop');
        $this->nullable        = true;
        $this->hasDefaultValue = true;
        $this->defaultValue    = 'defaultValue';
        $this->sut             = new MethodParameter(
            $this->name,
            $this->contractName,
            $this->nullable,
            $this->hasDefaultValue,
            $this->defaultValue
        );
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetInstanceName()
    {
        self::assertEquals($this->contractName, $this->sut->getInstanceName());
    }

    public function testGetInstanceFullName()
    {
        self::assertEquals('MyCompany\\Webshop\\User', $this->sut->getInstanceFullName());
    }

    public function testIsNullable()
    {
        self::assertEquals($this->nullable, $this->sut->isNullable());
    }

    public function testHasDefaultValue()
    {
        self::assertEquals($this->hasDefaultValue, $this->sut->hasDefaultValue());
    }

    public function testGetDefaultValue()
    {
        self::assertEquals($this->defaultValue, $this->sut->getDefaultValue());
    }
}
