<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadProjectorFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadProjectorGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadProjectorMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadProjectorMiddleware
 * @group  todo
 */
class SpecDoctrineReadProjectorMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecDoctrineReadProjectorFactory */
    private $factory;

    /** @var MockInterface|SpecDoctrineReadProjectorGenerator */
    private $generator;

    /** @var SpecDoctrineReadProjectorMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecDoctrineReadProjectorFactory::class);
        $this->generator = Mockery::mock(SpecDoctrineReadProjectorGenerator::class);
        $this->sut       = new SpecDoctrineReadProjectorMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
