<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecDateTimeValueObjectFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecDateTimeValueObjectGenerator;
use NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecDateTimeValueObjectMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecDateTimeValueObjectMiddleware
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
