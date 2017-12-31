<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\Definition;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSingleValueObject;
use NullDevelopment\SkeletonPhpUnitExtension\Method\SetUpMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestGetterMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSingleValueObject
 * @group  todo
 */
class TestSingleValueObjectTest extends TestCase
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

    /** @var MockInterface|ConstructorMethod */
    private $constructorMethod;

    /** @var array */
    private $properties;

    /** @var Method[]|array */
    private $methods;

    /** @var MockInterface|ClassName */
    private $subjectUnderTest;

    /** @var TestSingleValueObject */
    private $sut;

    public function setUp()
    {
        $firstName = Fixtures::firstNameProperty();

        $this->name              = Mockery::mock(ClassName::class);
        $this->parent            = Mockery::mock(ClassName::class);
        $this->interfaces        = [];
        $this->traits            = [];
        $this->constructorMethod = Mockery::mock(ConstructorMethod::class);
        $this->properties        = [];
        $this->methods           = [
            new SetUpMethod($this->name, [$firstName]),
            new TestGetterMethod('testGetFirstName', 'getFistName', $firstName),
            new TestGetterMethod('testGetValue', 'getValue', $firstName),
        ];
        $this->subjectUnderTest = Mockery::mock(ClassName::class);
        $this->sut              = new TestSingleValueObject(
            $this->name,
            $this->parent,
            $this->interfaces,
            $this->traits,
            $this->properties,
            $this->methods,
            $this->subjectUnderTest
        );
    }

    public function testGetName()
    {
        $this->markTestSkipped('Skipping');
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
        $this->markTestSkipped('Skipping');
    }

    public function testGetParent()
    {
        $this->markTestSkipped('Skipping');
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
        $this->markTestSkipped('Skipping');
    }

    public function testGetInterfaces()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasTraits()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetTraits()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetConstructorParameters()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasProperties()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetProperties()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testToArray()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetGenerationPriority()
    {
        $this->markTestSkipped('Skipping');
    }
}
