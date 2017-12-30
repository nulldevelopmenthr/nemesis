<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleCollectionFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleCollectionGenerator;
use NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecSimpleCollectionMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecSimpleCollectionMiddleware
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
