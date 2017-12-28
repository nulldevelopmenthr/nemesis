<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleEntityFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleEntityGenerator;
use NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestSimpleEntityMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestSimpleEntityMiddleware
 * @group  todo
 */
class TestSimpleEntityMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|TestSimpleEntityFactory */
    private $factory;
    /** @var MockInterface|TestSimpleEntityGenerator */
    private $generator;
    /** @var TestSimpleEntityMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestSimpleEntityFactory::class);
        $this->generator = Mockery::mock(TestSimpleEntityGenerator::class);
        $this->sut       = new TestSimpleEntityMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
