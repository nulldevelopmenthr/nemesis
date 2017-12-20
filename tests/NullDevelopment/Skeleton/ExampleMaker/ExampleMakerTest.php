<?php

declare(strict_types=1);

namespace tests\NullDevelopment\Skeleton\ExampleMaker;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Variable;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\ArrayExample;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\InstanceExample;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\ExampleMaker\ExampleMaker
 * @group  todo
 */
class ExampleMakerTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ExampleMaker */
    private $exampleMaker;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker();
    }

    public function testItReturnsNumberOneWhenAskedForAnInteger()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getInstanceFullName')->twice()->andReturn('int');

        self::assertEquals(new SimpleExample('1'), $this->exampleMaker->instance($parameter));
    }

    public function testItReturnsVariableNameWhenVariableIsInstanceOfString()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getInstanceFullName')->twice()->andReturn('string');
        $parameter->expects('getName')->andReturn('description');

        self::assertEquals(new SimpleExample('description'), $this->exampleMaker->instance($parameter));
    }

    public function testItReturnsNumberWithDecimalsForFloat()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getInstanceFullName')->twice()->andReturn('float');

        self::assertEquals(new SimpleExample('2.0'), $this->exampleMaker->instance($parameter));
    }

    public function testItReturnsTrueWhenAskedForBoolean()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getInstanceFullName')->twice()->andReturn('bool');

        self::assertEquals(new SimpleExample(true), $this->exampleMaker->instance($parameter));
    }

    public function testItReturnsSimpleArrayWhenAskedForArray()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getInstanceFullName')->twice()->andReturn('array');

        self::assertEquals(new ArrayExample([new SimpleExample('data')]), $this->exampleMaker->instance($parameter));
    }

    public function testItReturnsFirstMinuteOf2018ForDateTimeExample()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getInstanceFullName')->twice()->andReturn('DateTime');

        self::assertEquals(
            new InstanceExample(new ClassName('DateTime'), [new SimpleExample('2018-01-01 00:01:00')]),
            $this->exampleMaker->instance($parameter)
        );
    }
}
