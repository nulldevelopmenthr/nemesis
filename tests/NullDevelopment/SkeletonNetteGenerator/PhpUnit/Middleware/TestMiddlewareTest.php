<?php

declare(strict_types=1);

namespace tests\NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestMiddleware
 * @group  todo
 */
class TestMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestMiddleware */
    private $testMiddleware;

    public function setUp()
    {
        $this->testMiddleware = new TestMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
