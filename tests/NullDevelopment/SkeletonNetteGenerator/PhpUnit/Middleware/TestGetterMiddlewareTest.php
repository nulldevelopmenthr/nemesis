<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestGetterMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestGetterMiddleware
 * @group  todo
 */
class TestGetterMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestGetterMiddleware */
    private $testGetterMiddleware;

    public function setUp()
    {
        $this->testGetterMiddleware = new TestGetterMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
