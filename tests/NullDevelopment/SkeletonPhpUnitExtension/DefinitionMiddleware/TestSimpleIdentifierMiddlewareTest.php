<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleIdentifierFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleIdentifierGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestSimpleIdentifierMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestSimpleIdentifierMiddleware
 * @group  todo
 */
class TestSimpleIdentifierMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestSimpleIdentifierFactory */
    private $factory;

    /** @var MockInterface|TestSimpleIdentifierGenerator */
    private $generator;

    /** @var TestSimpleIdentifierMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestSimpleIdentifierFactory::class);
        $this->generator = Mockery::mock(TestSimpleIdentifierGenerator::class);
        $this->sut       = new TestSimpleIdentifierMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
