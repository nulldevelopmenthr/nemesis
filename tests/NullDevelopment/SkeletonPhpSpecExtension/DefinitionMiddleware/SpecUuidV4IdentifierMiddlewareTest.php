<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecUuidV4IdentifierFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecUuidV4IdentifierGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecUuidV4IdentifierMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecUuidV4IdentifierMiddleware
 * @group  todo
 */
class SpecUuidV4IdentifierMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecUuidV4IdentifierFactory */
    private $factory;

    /** @var MockInterface|SpecUuidV4IdentifierGenerator */
    private $generator;

    /** @var SpecUuidV4IdentifierMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecUuidV4IdentifierFactory::class);
        $this->generator = Mockery::mock(SpecUuidV4IdentifierGenerator::class);
        $this->sut       = new SpecUuidV4IdentifierMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
