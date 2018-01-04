<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpec\SpecEventSourcedEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator\SpecEventSourcedEntityMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator\SpecEventSourcedEntityNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpecGenerator\SpecEventSourcedEntityMiddleware
 * @group  todo
 */
class SpecEventSourcedEntityMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecEventSourcedEntityFactory */
    private $factory;

    /** @var MockInterface|SpecEventSourcedEntityNetteGenerator */
    private $generator;

    /** @var SpecEventSourcedEntityMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecEventSourcedEntityFactory::class);
        $this->generator = Mockery::mock(SpecEventSourcedEntityNetteGenerator::class);
        $this->sut       = new SpecEventSourcedEntityMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
