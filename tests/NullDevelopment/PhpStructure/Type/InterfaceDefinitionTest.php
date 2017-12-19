<?php

namespace tests\NullDevelopment\PhpStructure\Type;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\Type\InterfaceDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\Type\InterfaceDefinition
 * @group  unit
 */
class InterfaceDefinitionTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|InterfaceName */
    private $name;
    /** @var MockInterface|InterfaceName */
    private $parentName;
    /** @var array */
    private $constants;
    /** @var array */
    private $methods;
    /** @var InterfaceDefinition */
    private $sut;

    public function setUp()
    {
        $this->name       = Mockery::mock(InterfaceName::class);
        $this->parentName = Mockery::mock(InterfaceName::class);
        $this->constants  = [Mockery::mock(Constant::class)];
        $this->methods    = [Mockery::mock(Method::class)];
        $this->sut        = new InterfaceDefinition($this->name, $this->parentName, $this->constants, $this->methods);
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetParentName()
    {
        self::assertEquals($this->parentName, $this->sut->getParentName());
    }

    public function testGetConstants()
    {
        self::assertEquals($this->constants, $this->sut->getConstants());
    }

    public function testGetMethods()
    {
        self::assertEquals($this->methods, $this->sut->getMethods());
    }
}
