<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSingleValueObjectFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSingleValueObjectGenerator;
use NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestSingleValueObjectMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestSingleValueObjectMiddleware
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
