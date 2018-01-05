<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadProjectorFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadProjectorGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadProjectorMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadProjectorMiddleware
 * @group  todo
 */
class TestDoctrineReadProjectorMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestDoctrineReadProjectorFactory */
    private $factory;

    /** @var MockInterface|TestDoctrineReadProjectorGenerator */
    private $generator;

    /** @var TestDoctrineReadProjectorMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestDoctrineReadProjectorFactory::class);
        $this->generator = Mockery::mock(TestDoctrineReadProjectorGenerator::class);
        $this->sut       = new TestDoctrineReadProjectorMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
