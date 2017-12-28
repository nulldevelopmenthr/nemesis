<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSingleValueObjectFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSingleValueObjectGenerator;
use NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecSingleValueObjectMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecSingleValueObjectMiddleware
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
