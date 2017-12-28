<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Definition\PHP\Methods;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\DeserializeMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\Methods\DeserializeMethod
 * @group  todo
 */
class DeserializeMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ImprovedClassSource */
    private $classSource;
    /** @var DeserializeMethod */
    private $sut;

    public function setUp()
    {
        $this->classSource = Mockery::mock(ImprovedClassSource::class);
        $this->sut         = new DeserializeMethod($this->classSource);
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
