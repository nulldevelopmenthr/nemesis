<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadRepositoryGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadRepositoryMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadRepositoryMiddleware
 * @group  todo
 */
class TestDoctrineReadRepositoryMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestDoctrineReadRepositoryFactory */
    private $factory;

    /** @var MockInterface|TestDoctrineReadRepositoryGenerator */
    private $generator;

    /** @var TestDoctrineReadRepositoryMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestDoctrineReadRepositoryFactory::class);
        $this->generator = Mockery::mock(TestDoctrineReadRepositoryGenerator::class);
        $this->sut       = new TestDoctrineReadRepositoryMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
