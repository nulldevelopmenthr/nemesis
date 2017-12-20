<?php

namespace tests\NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\ConstructorMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\ConstructorMiddleware
 * @group todo
 */
class ConstructorMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ConstructorMiddleware */
    private $sut;

    public function setUp()
    {
        $this->sut = new ConstructorMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
