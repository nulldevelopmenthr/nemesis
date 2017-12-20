<?php

namespace tests\NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\CastableToStringMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\CastableToStringMiddleware
 * @group todo
 */
class CastableToStringMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var CastableToStringMiddleware */
    private $sut;

    public function setUp()
    {
        $this->sut = new CastableToStringMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
