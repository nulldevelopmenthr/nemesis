<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec\SpecEventSourcedAggregateRootFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator\SpecEventSourcedAggregateRootMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator\SpecEventSourcedAggregateRootNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpecGenerator\SpecEventSourcedAggregateRootMiddleware
 * @group  todo
 */
class SpecEventSourcedAggregateRootMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecEventSourcedAggregateRootFactory */
    private $factory;

    /** @var MockInterface|SpecEventSourcedAggregateRootNetteGenerator */
    private $generator;

    /** @var SpecEventSourcedAggregateRootMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecEventSourcedAggregateRootFactory::class);
        $this->generator = Mockery::mock(SpecEventSourcedAggregateRootNetteGenerator::class);
        $this->sut       = new SpecEventSourcedAggregateRootMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
