<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEventFactory;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventMiddleware
 * @group  todo
 */
class SpecEventMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecEventFactory */
    private $factory;

    /** @var MockInterface|SpecEventNetteGenerator */
    private $generator;

    /** @var SpecEventMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecEventFactory::class);
        $this->generator = Mockery::mock(SpecEventNetteGenerator::class);
        $this->sut       = new SpecEventMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
