<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\PhpStructure\DataType;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\ContractName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\DataType\Property
 * @group  unit
 */
class PropertyTest extends TestCase
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
    /** @var MockInterface|Visibility */
    private $visibility;
    /** @var Property */
    private $sut;

    public function setUp()
    {
        $this->name            = 'name';
        $this->contractName    = new ClassName('User', 'MyVendor\Webshop');
        $this->nullable        = true;
        $this->hasDefaultValue = true;
        $this->defaultValue    = 'defaultValue';
        $this->visibility      = Mockery::mock(Visibility::class);
        $this->sut             = new Property(
            $this->name,
            $this->contractName,
            $this->nullable,
            $this->hasDefaultValue,
            $this->defaultValue,
            $this->visibility
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
        self::assertEquals('MyVendor\Webshop\\User', $this->sut->getInstanceFullName());
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

    public function testGetVisibility()
    {
        self::assertEquals($this->visibility, $this->sut->getVisibility());
    }
}
