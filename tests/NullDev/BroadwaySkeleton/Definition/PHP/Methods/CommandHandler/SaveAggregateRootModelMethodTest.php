<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\SaveAggregateRootModelMethod;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\SaveAggregateRootModelMethod
 * @group  todo
 */
class SaveAggregateRootModelMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|RootModelClassName */
    private $modelClassName;
    /** @var SaveAggregateRootModelMethod */
    private $sut;

    public function setUp()
    {
        $this->modelClassName = Mockery::mock(RootModelClassName::class);
        $this->sut            = new SaveAggregateRootModelMethod($this->modelClassName);
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
