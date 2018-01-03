<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestUuidV4IdentifierFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestUuidV4IdentifierGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestUuidV4IdentifierMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestUuidV4IdentifierMiddleware
 * @group  todo
 */
class TestUuidV4IdentifierMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestUuidV4IdentifierFactory */
    private $factory;

    /** @var MockInterface|TestUuidV4IdentifierGenerator */
    private $generator;

    /** @var TestUuidV4IdentifierMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestUuidV4IdentifierFactory::class);
        $this->generator = Mockery::mock(TestUuidV4IdentifierGenerator::class);
        $this->sut       = new TestUuidV4IdentifierMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
