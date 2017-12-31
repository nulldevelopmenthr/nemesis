<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleCollectionFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleCollectionGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestSimpleCollectionMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestSimpleCollectionMiddleware
 * @group  todo
 */
class TestSimpleCollectionMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestSimpleCollectionFactory */
    private $factory;

    /** @var MockInterface|TestSimpleCollectionGenerator */
    private $generator;

    /** @var TestSimpleCollectionMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestSimpleCollectionFactory::class);
        $this->generator = Mockery::mock(TestSimpleCollectionGenerator::class);
        $this->sut       = new TestSimpleCollectionMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
