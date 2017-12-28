<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\Definition;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleCollection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleCollection
 * @group  todo
 */
class TestSimpleCollectionTest extends TestCase
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
    /** @var array */
    private $properties;
    /** @var array */
    private $methods;
    /** @var MockInterface|ClassName */
    private $subjectUnderTest;
    /** @var MockInterface|CollectionOf */
    private $collectionOf;
    /** @var TestSimpleCollection */
    private $sut;

    public function setUp()
    {
        $this->name             = Mockery::mock(ClassName::class);
        $this->parent           = Mockery::mock(ClassName::class);
        $this->interfaces       = [];
        $this->traits           = [];
        $this->properties       = [];
        $this->methods          = [];
        $this->subjectUnderTest = Mockery::mock(ClassName::class);
        $this->collectionOf     = Mockery::mock(CollectionOf::class);
        $this->sut              = new TestSimpleCollection(
            $this->name,
            $this->parent,
            $this->interfaces,
            $this->traits,
            $this->properties,
            $this->methods,
            $this->subjectUnderTest,
            $this->collectionOf
        );
    }

    public function testGetCollectionOf()
    {
        self::assertEquals($this->collectionOf, $this->sut->getCollectionOf());
    }

    public function testGetSubjectUnderTest()
    {
        self::assertEquals($this->subjectUnderTest, $this->sut->getSubjectUnderTest());
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
