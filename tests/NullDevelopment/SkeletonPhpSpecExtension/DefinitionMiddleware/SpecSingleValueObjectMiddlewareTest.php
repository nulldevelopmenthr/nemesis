<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSingleValueObjectFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSingleValueObjectGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecSingleValueObjectMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecSingleValueObjectMiddleware
 * @group  todo
 */
class SpecSingleValueObjectMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecSingleValueObjectFactory */
    private $factory;

    /** @var MockInterface|SpecSingleValueObjectGenerator */
    private $generator;

    /** @var SpecSingleValueObjectMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecSingleValueObjectFactory::class);
        $this->generator = Mockery::mock(SpecSingleValueObjectGenerator::class);
        $this->sut       = new SpecSingleValueObjectMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
