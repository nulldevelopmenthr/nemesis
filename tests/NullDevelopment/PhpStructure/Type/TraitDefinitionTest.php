<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\PhpStructure\Type;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\PhpStructure\Type\TraitDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\Type\TraitDefinition
 * @group  unit
 */
class TraitDefinitionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TraitName */
    private $name;

    /** @var array */
    private $traits;

    /** @var array */
    private $constants;

    /** @var array */
    private $properties;

    /** @var array */
    private $methods;

    /** @var TraitDefinition */
    private $sut;

    public function setUp()
    {
        $this->name       = Mockery::mock(TraitName::class);
        $this->traits     = [Mockery::mock(TraitName::class)];
        $this->constants  = [Mockery::mock(Constant::class)];
        $this->properties = [Mockery::mock(Property::class)];
        $this->methods    = [Mockery::mock(Method::class)];
        $this->sut        = new TraitDefinition(
            $this->name, $this->traits, $this->constants, $this->properties, $this->methods
        );
    }

    public function testGetInstanceOf()
    {
        self::assertEquals($this->name, $this->sut->getInstanceOf());
    }

    public function testGetTraits()
    {
        self::assertEquals($this->traits, $this->sut->getTraits());
    }

    public function testGetConstants()
    {
        self::assertEquals($this->constants, $this->sut->getConstants());
    }

    public function testGetProperties()
    {
        self::assertEquals($this->properties, $this->sut->getProperties());
    }

    public function testGetMethods()
    {
        self::assertEquals($this->methods, $this->sut->getMethods());
    }
}
