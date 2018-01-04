<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec\SpecEventSourcingRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator\SpecEventSourcingRepositoryMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator\SpecEventSourcingRepositoryNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator\SpecEventSourcingRepositoryMiddleware
 * @group  todo
 */
class SpecEventSourcingRepositoryMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecEventSourcingRepositoryFactory */
    private $factory;

    /** @var MockInterface|SpecEventSourcingRepositoryNetteGenerator */
    private $generator;

    /** @var SpecEventSourcingRepositoryMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecEventSourcingRepositoryFactory::class);
        $this->generator = Mockery::mock(SpecEventSourcingRepositoryNetteGenerator::class);
        $this->sut       = new SpecEventSourcingRepositoryMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
