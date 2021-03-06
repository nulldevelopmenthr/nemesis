<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandler;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandler
 * @group  todo
 */
class TestCommandHandlerTest extends TestCase
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

    /** @var Method[]|array */
    private $methods;

    /** @var MockInterface|ClassName */
    private $subjectUnderTest;

    /** @var TestCommandHandler */
    private $sut;

    public function setUp()
    {
        $this->name              = Mockery::mock(ClassName::class);
        $this->parent            = Mockery::mock(ClassName::class);
        $this->interfaces        = [];
        $this->traits            = [];
        $this->constants         = [Constant::create('SOME_CONST', '29')];
        $this->constructorMethod = Mockery::mock(ConstructorMethod::class);
        $this->properties        = [];
        $this->methods           = [];
        $this->subjectUnderTest  = Mockery::mock(ClassName::class);
        $this->sut               = new TestCommandHandler(
            $this->name,
            $this->parent,
            $this->interfaces,
            $this->traits,
            $this->constants,
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
