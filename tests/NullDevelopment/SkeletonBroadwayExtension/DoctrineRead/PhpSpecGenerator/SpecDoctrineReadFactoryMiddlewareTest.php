<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadFactoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadFactoryGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadFactoryMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadFactoryMiddleware
 * @group  todo
 */
class SpecDoctrineReadFactoryMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecDoctrineReadFactoryFactory */
    private $factory;

    /** @var MockInterface|SpecDoctrineReadFactoryGenerator */
    private $generator;

    /** @var SpecDoctrineReadFactoryMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecDoctrineReadFactoryFactory::class);
        $this->generator = Mockery::mock(SpecDoctrineReadFactoryGenerator::class);
        $this->sut       = new SpecDoctrineReadFactoryMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
