<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\PhpStructure\Type;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\Type\ClassDefinition
 * @group  unit
 */
class ClassDefinitionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ClassName */
    private $name;

    /** @var MockInterface|ClassName */
    private $parent;

    /** @var array */
    private $interfaces;

    /** @var array */
    private $traits;

    /** @var Constant[]|array */
    private $constants;

    /** @var MockInterface|ConstructorMethod */
    private $constructorMethod;

    /** @var array */
    private $properties;

    /** @var array */
    private $methods;

    /** @var ClassDefinition */
    private $sut;

    public function setUp()
    {
        $this->name       = Mockery::mock(ClassName::class);
        $this->parent     = Mockery::mock(ClassName::class);
        $this->interfaces = [
            Mockery::mock(InterfaceName::class),
        ];
        $this->traits = [
            Mockery::mock(TraitName::class),
        ];
        $this->constants         = [Constant::create('SOME_CONST', '29')];
        $this->constructorMethod = Mockery::mock(ConstructorMethod::class);
        $this->properties        = [
            Mockery::mock(Property::class),
        ];
        $this->methods = [
            $this->constructorMethod,
        ];
        $this->sut = new ClassDefinition(
            $this->name,
            $this->parent,
            $this->interfaces,
            $this->traits,
            $this->constants,
            $this->properties,
            $this->methods
        );
    }

    public function testGetInstanceOf()
    {
        self::assertEquals($this->name, $this->sut->getInstanceOf());
    }

    public function testGetClassName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetNamespace()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetFullClassName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasParent()
    {
        self::assertEquals(true, $this->sut->hasParent());
    }

    public function testGetParent()
    {
        self::assertEquals($this->parent, $this->sut->getParent());
    }

    public function testGetParentClassName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParentFullClassName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasInterfaces()
    {
        self::assertTrue($this->sut->hasInterfaces());
    }

    public function testGetInterfaces()
    {
        self::assertEquals($this->interfaces, $this->sut->getInterfaces());
    }

    public function testHasTraits()
    {
        self::assertTrue($this->sut->hasTraits());
    }

    public function testGetTraits()
    {
        self::assertEquals($this->traits, $this->sut->getTraits());
    }

    public function testHasConstructorMethod()
    {
        self::assertTrue($this->sut->hasConstructorMethod());
    }

    public function testGetConstructorMethod()
    {
        self::assertEquals($this->constructorMethod, $this->sut->getConstructorMethod());
    }

    public function testGetConstructorParameters()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasProperties()
    {
        self::assertTrue($this->sut->hasProperties());
    }

    public function testGetProperties()
    {
        self::assertEquals($this->properties, $this->sut->getProperties());
    }

    public function testToArray()
    {
        $this->markTestSkipped('Skipping');
    }
}
