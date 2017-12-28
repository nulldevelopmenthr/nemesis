<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\Definition;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleCollection;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleCollection
 * @group  unit
 */
class SpecSimpleCollectionTest extends TestCase
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
    /** @var Property[]|array */
    private $properties;
    /** @var Method[]|array */
    private $methods;
    /** @var CollectionOf */
    private $collectionOf;
    /** @var SpecSimpleCollection */
    private $sut;

    public function setUp()
    {
        $firstName = Fixtures::firstNameProperty();

        $this->name       = Fixtures::userEntity();
        $this->parent     = ClassName::create('MyVendor\\Core\\BaseModel');
        $this->interfaces = [InterfaceName::create('MyVendor\\Core\\SomeInterface')];
        $this->traits     = [TraitName::create('MyVendor\\Core\\ImportantTrait')];
        $this->properties = [$firstName];
        $this->methods    = [
            new LetMethod([$firstName]),
            new InitializableMethod($this->name, $this->parent, $this->interfaces),
            new GetterMethod('it_exposes_first_name', $firstName),
            new GetterMethod('it_exposes_value', $firstName),
        ];
        $this->collectionOf = new CollectionOf(
            ClassName::create('MyVendor\User\Username'),
            'getId',
            ClassName::create('MyVendor\User\UserId')
        );
        $this->sut = new SpecSimpleCollection(
            $this->name,
            $this->parent,
            $this->interfaces,
            $this->traits,
            $this->properties,
            $this->methods,
            $this->collectionOf,
            Fixtures::userEntity()
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
        self::assertFalse($this->sut->hasConstructorMethod());
    }

    public function testGetConstructorMethod()
    {
        self::assertNull($this->sut->getConstructorMethod());
    }

    public function testGetConstructorParameters()
    {
        self::assertEmpty($this->sut->getConstructorParameters());
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
