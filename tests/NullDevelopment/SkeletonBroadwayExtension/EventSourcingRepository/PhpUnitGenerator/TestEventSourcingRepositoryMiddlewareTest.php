<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit\TestEventSourcingRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator\TestEventSourcingRepositoryMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator\TestEventSourcingRepositoryNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator\TestEventSourcingRepositoryMiddleware
 * @group  todo
 */
class TestEventSourcingRepositoryMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestEventSourcingRepositoryFactory */
    private $factory;

    /** @var MockInterface|TestEventSourcingRepositoryNetteGenerator */
    private $generator;

    /** @var TestEventSourcingRepositoryMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestEventSourcingRepositoryFactory::class);
        $this->generator = Mockery::mock(TestEventSourcingRepositoryNetteGenerator::class);
        $this->sut       = new TestEventSourcingRepositoryMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
