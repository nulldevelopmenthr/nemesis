<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandlerFactory;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerMiddleware
 * @group  todo
 */
class TestCommandHandlerMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestCommandHandlerFactory */
    private $factory;

    /** @var MockInterface|TestCommandHandlerNetteGenerator */
    private $generator;

    /** @var TestCommandHandlerMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestCommandHandlerFactory::class);
        $this->generator = Mockery::mock(TestCommandHandlerNetteGenerator::class);
        $this->sut       = new TestCommandHandlerMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
