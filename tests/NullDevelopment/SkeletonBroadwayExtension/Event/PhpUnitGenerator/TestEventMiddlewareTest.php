<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEventFactory;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventMiddleware
 * @group  todo
 */
class TestEventMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestEventFactory */
    private $factory;

    /** @var MockInterface|TestEventNetteGenerator */
    private $generator;

    /** @var TestEventMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestEventFactory::class);
        $this->generator = Mockery::mock(TestEventNetteGenerator::class);
        $this->sut       = new TestEventMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
