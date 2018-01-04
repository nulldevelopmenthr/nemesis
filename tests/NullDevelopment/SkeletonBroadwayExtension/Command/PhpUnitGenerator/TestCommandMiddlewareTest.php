<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommandFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandMiddleware
 * @group  todo
 */
class TestCommandMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestCommandFactory */
    private $factory;

    /** @var MockInterface|TestCommandNetteGenerator */
    private $generator;

    /** @var TestCommandMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestCommandFactory::class);
        $this->generator = Mockery::mock(TestCommandNetteGenerator::class);
        $this->sut       = new TestCommandMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
