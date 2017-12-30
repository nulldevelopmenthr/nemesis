<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleIdentifierFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleIdentifierGenerator;
use NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestSimpleIdentifierMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestSimpleIdentifierMiddleware
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
