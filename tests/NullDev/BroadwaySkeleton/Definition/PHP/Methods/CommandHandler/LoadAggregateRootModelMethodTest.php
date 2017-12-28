<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\LoadAggregateRootModelMethod;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\LoadAggregateRootModelMethod
 * @group  todo
 */
class LoadAggregateRootModelMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|RootIdClassName */
    private $idClassName;
    /** @var MockInterface|RootModelClassName */
    private $modelClassName;
    /** @var LoadAggregateRootModelMethod */
    private $sut;

    public function setUp()
    {
        $this->idClassName    = Mockery::mock(RootIdClassName::class);
        $this->modelClassName = Mockery::mock(RootModelClassName::class);
        $this->sut            = new LoadAggregateRootModelMethod($this->idClassName, $this->modelClassName);
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
