<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSingleValueObjectFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSingleValueObjectGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestSingleValueObjectMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestSingleValueObjectMiddleware
 * @group  todo
 */
class TestSingleValueObjectMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestSingleValueObjectFactory */
    private $factory;

    /** @var MockInterface|TestSingleValueObjectGenerator */
    private $generator;

    /** @var TestSingleValueObjectMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestSingleValueObjectFactory::class);
        $this->generator = Mockery::mock(TestSingleValueObjectGenerator::class);
        $this->sut       = new TestSingleValueObjectMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
