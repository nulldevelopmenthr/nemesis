<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadEntityGenerator;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadEntityMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadEntityMiddleware
 * @group  todo
 */
class TestDoctrineReadEntityMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestDoctrineReadEntityFactory */
    private $factory;

    /** @var MockInterface|TestDoctrineReadEntityGenerator */
    private $generator;

    /** @var TestDoctrineReadEntityMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestDoctrineReadEntityFactory::class);
        $this->generator = Mockery::mock(TestDoctrineReadEntityGenerator::class);
        $this->sut       = new TestDoctrineReadEntityMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
