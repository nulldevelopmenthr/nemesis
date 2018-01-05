<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadFactoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadFactoryGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadFactoryMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadFactoryMiddleware
 * @group  todo
 */
class TestDoctrineReadFactoryMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestDoctrineReadFactoryFactory */
    private $factory;

    /** @var MockInterface|TestDoctrineReadFactoryGenerator */
    private $generator;

    /** @var TestDoctrineReadFactoryMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestDoctrineReadFactoryFactory::class);
        $this->generator = Mockery::mock(TestDoctrineReadFactoryGenerator::class);
        $this->sut       = new TestDoctrineReadFactoryMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
