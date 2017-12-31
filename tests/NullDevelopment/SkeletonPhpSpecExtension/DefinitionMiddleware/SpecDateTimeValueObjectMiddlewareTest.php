<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecDateTimeValueObjectFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecDateTimeValueObjectGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecDateTimeValueObjectMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecDateTimeValueObjectMiddleware
 * @group  todo
 */
class SpecDateTimeValueObjectMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecDateTimeValueObjectFactory */
    private $factory;

    /** @var MockInterface|SpecDateTimeValueObjectGenerator */
    private $generator;

    /** @var SpecDateTimeValueObjectMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecDateTimeValueObjectFactory::class);
        $this->generator = Mockery::mock(SpecDateTimeValueObjectGenerator::class);
        $this->sut       = new SpecDateTimeValueObjectMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
