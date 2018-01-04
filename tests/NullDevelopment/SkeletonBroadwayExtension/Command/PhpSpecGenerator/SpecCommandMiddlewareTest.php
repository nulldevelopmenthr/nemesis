<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommandFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandMiddleware;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandMiddleware
 * @group  todo
 */
class SpecCommandMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecCommandFactory */
    private $factory;

    /** @var MockInterface|SpecCommandNetteGenerator */
    private $generator;

    /** @var SpecCommandMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecCommandFactory::class);
        $this->generator = Mockery::mock(SpecCommandNetteGenerator::class);
        $this->sut       = new SpecCommandMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
