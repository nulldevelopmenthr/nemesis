<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Definition\PHP\Methods;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\Definition\PHP\Methods\GenericMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\GenericMethod
 * @group  todo
 */
class GenericMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $methodName;
    /** @var array */
    private $params;
    /** @var MockInterface|ClassType */
    private $returnType;
    /** @var GenericMethod */
    private $sut;

    public function setUp()
    {
        $this->methodName = 'methodName';
        $this->params     = [];
        $this->returnType = Mockery::mock(ClassType::class);
        $this->sut        = new GenericMethod($this->methodName, $this->params, $this->returnType);
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
        self::assertEquals($this->methodName, $this->sut->getMethodName());
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
