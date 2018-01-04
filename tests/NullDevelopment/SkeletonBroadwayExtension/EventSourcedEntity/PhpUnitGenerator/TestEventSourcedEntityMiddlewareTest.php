<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit\TestEventSourcedEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator\TestEventSourcedEntityMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator\TestEventSourcedEntityNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator\TestEventSourcedEntityMiddleware
 * @group  todo
 */
class TestEventSourcedEntityMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestEventSourcedEntityFactory */
    private $factory;

    /** @var MockInterface|TestEventSourcedEntityNetteGenerator */
    private $generator;

    /** @var TestEventSourcedEntityMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestEventSourcedEntityFactory::class);
        $this->generator = Mockery::mock(TestEventSourcedEntityNetteGenerator::class);
        $this->sut       = new TestEventSourcedEntityMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
