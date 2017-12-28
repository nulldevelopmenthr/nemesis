<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestToStringMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestToStringMiddleware
 * @group  todo
 */
class TestToStringMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestToStringMiddleware */
    private $testToStringMiddleware;

    public function setUp()
    {
        $this->testToStringMiddleware = new TestToStringMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
