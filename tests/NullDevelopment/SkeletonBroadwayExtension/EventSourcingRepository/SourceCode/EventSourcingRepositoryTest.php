<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;
use Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\EventSourcingRepositoryFixtures;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository
 * @group  todo
 */
class EventSourcingRepositoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var ClassName */
    private $name;

    /** @var ClassName */
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
    private $entity;

    /** @var EventSourcingRepository */
    private $sut;

    public function setUp()
    {
        $firstName = Fixtures::firstNameProperty();

        $this->name              = Fixtures::userEntity();
        $this->parent            = ClassName::create('MyVendor\\Core\\BaseModel');
        $this->interfaces        = [InterfaceName::create('MyVendor\\Core\\SomeInterface')];
        $this->traits            = [TraitName::create('MyVendor\\Core\\ImportantTrait')];
        $this->constants         = [Constant::create('SOME_CONST', '29')];
        $this->constructorMethod = new ConstructorMethod([$firstName]);
        $this->properties        = [$firstName];
        $this->methods           = [$this->constructorMethod];
        $this->entity            = EventSourcingRepositoryFixtures::actorEntityName();
        $this->sut               = new EventSourcingRepository(
            $this->name,
            $this->parent,
            $this->interfaces,
            $this->traits,
            $this->constants,
            $this->properties,
            $this->methods,
            $this->entity
        );
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetClassName()
    {
        self::assertEquals('UserEntity', $this->sut->getClassName());
    }

    public function testGetNamespace()
    {
        self::assertEquals('MyVendor', $this->sut->getNamespace());
    }

    public function testGetFullClassName()
    {
        self::assertEquals('MyVendor\\UserEntity', $this->sut->getFullClassName());
    }

    public function testHasParent()
    {
        self::assertTrue($this->sut->hasParent());
    }

    public function testGetParent()
    {
        self::assertEquals($this->parent, $this->sut->getParent());
    }

    public function testGetParentClassName()
    {
        self::assertEquals('BaseModel', $this->sut->getParentClassName());
    }

    public function testGetParentFullClassName()
    {
        self::assertEquals('MyVendor\\Core\\BaseModel', $this->sut->getParentFullClassName());
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
