<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Definition\PHP\Methods;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\SerializeMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\Methods\SerializeMethod
 * @group  todo
 */
class SerializeMethodTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|ImprovedClassSource */
    private $classSource;
    /** @var SerializeMethod */
    private $serializeMethod;

    public function setUp()
    {
        $this->classSource     = Mockery::mock(ImprovedClassSource::class);
        $this->serializeMethod = new SerializeMethod($this->classSource);
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
