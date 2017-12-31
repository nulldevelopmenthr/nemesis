<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSimpleCollectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleCollectionGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecSimpleCollectionMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecSimpleCollectionMiddleware
 * @group  todo
 */
class SpecSimpleCollectionMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecSimpleCollectionFactory */
    private $factory;

    /** @var MockInterface|SpecSimpleCollectionGenerator */
    private $generator;

    /** @var SpecSimpleCollectionMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecSimpleCollectionFactory::class);
        $this->generator = Mockery::mock(SpecSimpleCollectionGenerator::class);
        $this->sut       = new SpecSimpleCollectionMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
