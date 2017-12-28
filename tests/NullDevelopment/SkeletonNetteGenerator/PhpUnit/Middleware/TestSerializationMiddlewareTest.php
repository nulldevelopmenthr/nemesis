<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestSerializationMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestSerializationMiddleware
 * @group  todo
 */
class TestSerializationMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestSerializationMiddleware */
    private $testSerializationMiddleware;

    public function setUp()
    {
        $this->testSerializationMiddleware = new TestSerializationMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
