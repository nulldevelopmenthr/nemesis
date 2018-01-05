<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadRepositoryGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadRepositoryMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadRepositoryMiddleware
 * @group  todo
 */
class SpecDoctrineReadRepositoryMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecDoctrineReadRepositoryFactory */
    private $factory;

    /** @var MockInterface|SpecDoctrineReadRepositoryGenerator */
    private $generator;

    /** @var SpecDoctrineReadRepositoryMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecDoctrineReadRepositoryFactory::class);
        $this->generator = Mockery::mock(SpecDoctrineReadRepositoryGenerator::class);
        $this->sut       = new SpecDoctrineReadRepositoryMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
