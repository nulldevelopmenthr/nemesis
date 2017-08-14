<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Methods;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Definition\PHP\Methods\GenericMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\GenericMethod
 * @group  todo
 */
class GenericMethodTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $methodName;
    /** @var array */
    private $params;
    /** @var \Mockery\MockInterface|ClassType */
    private $returnType;
    /** @var GenericMethod */
    private $genericMethod;

    public function setUp()
    {
        $this->methodName    = 'methodName';
        $this->params        = [];
        $this->returnType    = Mockery::mock(ClassType::class);
        $this->genericMethod = new GenericMethod($this->methodName, $this->params, $this->returnType);
    }

    public function testGetVisibility()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsStatic()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetMethodName()
    {
        self::assertEquals($this->methodName, $this->genericMethod->getMethodName());
    }

    public function testGetMethodParameters()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasMethodReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetMethodReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParamsAsClassTypes()
    {
        $this->markTestSkipped('Skipping');
    }
}
