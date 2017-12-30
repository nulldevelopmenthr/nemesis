<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestDateTimeValueObjectFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestDateTimeValueObjectGenerator;
use NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestDateTimeValueObjectMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestDateTimeValueObjectMiddleware
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
