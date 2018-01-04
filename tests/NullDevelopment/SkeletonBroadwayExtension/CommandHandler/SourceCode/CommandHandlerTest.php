<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;
use Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\CommandHandlerFixtures;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler
 * @group  unit
 */
class CommandHandlerTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var ClassName */
    private $name;

    /** @var ClassName|null */
    private $parent;

    /** @var array */
    private $interfaces;

    /** @var array */
    private $traits;

    /** @var Constant[]|array */
    private $constants;

    /** @var Property[]|array */
    private $properties;

    /** @var Method[]|array */
    private $methods;

    /** @var MockInterface|ConstructorMethod */
    private $constructorMethod;

    /** @var ClassName */
    private $model;

    /** @var ClassName */
    private $modelId;

    /** @var CommandHandler */
    private $sut;

    public function setUp()
    {
        $firstName = CommandHandlerFixtures::firstNameProperty();

        $this->name              = CommandHandlerFixtures::commandName();
        $this->parent            = null;
        $this->interfaces        = [];
        $this->traits            = [];
        $this->constants         = [Constant::create('SOME_CONST', '29')];
        $this->constructorMethod = new ConstructorMethod([$firstName]);
        $this->properties        = [$firstName];
        $this->methods           = [$this->constructorMethod];
        $this->model             = CommandHandlerFixtures::modelName();
        $this->modelId           = CommandHandlerFixtures::idName();
        $this->sut               = new CommandHandler(
            $this->name,
            $this->parent,
            $this->interfaces,
            $this->traits,
            $this->constants,
            $this->properties,
            $this->methods,
            $this->model,
            $this->modelId
        );
    }

    public function testGetInstanceOf()
    {
        self::assertEquals($this->name, $this->sut->getInstanceOf());
    }

    public function testGetInstanceOfName()
    {
        self::assertEquals('CreateNewShow', $this->sut->getInstanceOfName());
    }

    public function testGetNamespace()
    {
        self::assertEquals('MyVendor\\Theater\\Domain\\Command', $this->sut->getNamespace());
    }

    public function testGetInstanceOfFullName()
    {
        self::assertEquals('MyVendor\\Theater\\Domain\\Command\\CreateNewShow', $this->sut->getInstanceOfFullName());
    }

    public function testHasParent()
    {
        self::assertFalse($this->sut->hasParent());
    }

    public function testGetParent()
    {
        self::assertEquals(null, $this->sut->getParent());
    }

    public function testGetParentClassName()
    {
        self::assertEquals('', $this->sut->getParentClassName());
    }

    public function testGetParentFullClassName()
    {
        self::assertEquals('', $this->sut->getParentFullClassName());
    }

    public function testHasInterfaces()
    {
        self::assertFalse($this->sut->hasInterfaces());
    }

    public function testGetInterfaces()
    {
        self::assertEquals($this->interfaces, $this->sut->getInterfaces());
    }

    public function testHasTraits()
    {
        self::assertFalse($this->sut->hasTraits());
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

    public function testHasMethods()
    {
        self::assertTrue($this->sut->hasMethods());
    }

    public function testGetMethods()
    {
        self::assertEquals($this->methods, $this->sut->getMethods());
    }

    public function testToArray()
    {
        $this->markTestSkipped('Skipping');
    }
}
