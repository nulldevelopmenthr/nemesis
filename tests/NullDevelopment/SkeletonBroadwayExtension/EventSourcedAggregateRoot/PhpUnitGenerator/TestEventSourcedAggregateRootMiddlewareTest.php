<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnit\TestEventSourcedAggregateRootFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootMiddleware
 * @group  todo
 */
class TestEventSourcedAggregateRootMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestEventSourcedAggregateRootFactory */
    private $factory;

    /** @var MockInterface|TestEventSourcedAggregateRootNetteGenerator */
    private $generator;

    /** @var TestEventSourcedAggregateRootMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestEventSourcedAggregateRootFactory::class);
        $this->generator = Mockery::mock(TestEventSourcedAggregateRootNetteGenerator::class);
        $this->sut       = new TestEventSourcedAggregateRootMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
