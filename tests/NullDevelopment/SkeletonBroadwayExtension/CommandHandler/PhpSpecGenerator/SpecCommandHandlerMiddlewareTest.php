<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandlerFactory;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerMiddleware
 * @group  todo
 */
class SpecCommandHandlerMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecCommandHandlerFactory */
    private $factory;

    /** @var MockInterface|SpecCommandHandlerNetteGenerator */
    private $generator;

    /** @var SpecCommandHandlerMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecCommandHandlerFactory::class);
        $this->generator = Mockery::mock(SpecCommandHandlerNetteGenerator::class);
        $this->sut       = new SpecCommandHandlerMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
