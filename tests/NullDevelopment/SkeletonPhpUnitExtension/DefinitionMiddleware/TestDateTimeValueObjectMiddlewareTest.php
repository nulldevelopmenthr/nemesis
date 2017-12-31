<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestDateTimeValueObjectFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestDateTimeValueObjectGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestDateTimeValueObjectMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestDateTimeValueObjectMiddleware
 * @group  todo
 */
class TestDateTimeValueObjectMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TestDateTimeValueObjectFactory */
    private $factory;

    /** @var MockInterface|TestDateTimeValueObjectGenerator */
    private $generator;

    /** @var TestDateTimeValueObjectMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(TestDateTimeValueObjectFactory::class);
        $this->generator = Mockery::mock(TestDateTimeValueObjectGenerator::class);
        $this->sut       = new TestDateTimeValueObjectMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
