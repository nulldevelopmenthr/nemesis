<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadEntityGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadEntityMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadEntityMiddleware
 * @group  todo
 */
class SpecDoctrineReadEntityMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecDoctrineReadEntityFactory */
    private $factory;

    /** @var MockInterface|SpecDoctrineReadEntityGenerator */
    private $generator;

    /** @var SpecDoctrineReadEntityMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecDoctrineReadEntityFactory::class);
        $this->generator = Mockery::mock(SpecDoctrineReadEntityGenerator::class);
        $this->sut       = new SpecDoctrineReadEntityMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
