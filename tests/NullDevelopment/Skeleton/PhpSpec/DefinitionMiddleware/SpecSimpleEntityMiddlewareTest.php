<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleEntityFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleEntityGenerator;
use NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecSimpleEntityMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecSimpleEntityMiddleware
 * @group  todo
 */
class SpecSimpleEntityMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecSimpleEntityFactory */
    private $factory;

    /** @var MockInterface|SpecSimpleEntityGenerator */
    private $generator;

    /** @var SpecSimpleEntityMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecSimpleEntityFactory::class);
        $this->generator = Mockery::mock(SpecSimpleEntityGenerator::class);
        $this->sut       = new SpecSimpleEntityMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
