<?php

namespace tests\NullDev\BroadwaySkeleton\Definition\PHP\Methods;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\SerializeMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\Methods\SerializeMethod
 * @group  todo
 */
class SerializeMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ImprovedClassSource */
    private $classSource;
    /** @var SerializeMethod */
    private $sut;

    public function setUp()
    {
        $this->classSource = Mockery::mock(ImprovedClassSource::class);
        $this->sut         = new SerializeMethod($this->classSource);
    }

    public function testGetProperties()
    {
        $this->markTestSkipped('Skipping');
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
        $this->markTestSkipped('Skipping');
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
}
