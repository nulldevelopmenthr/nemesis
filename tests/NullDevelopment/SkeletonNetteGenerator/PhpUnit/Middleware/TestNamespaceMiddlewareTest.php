<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestNamespaceMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestNamespaceMiddleware
 * @group  todo
 */
class TestNamespaceMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestNamespaceMiddleware */
    private $testNamespaceMiddleware;

    public function setUp()
    {
        $this->testNamespaceMiddleware = new TestNamespaceMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
