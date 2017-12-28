<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecNamespaceMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecNamespaceMiddleware
 * @group  todo
 */
class SpecNamespaceMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecNamespaceMiddleware */
    private $specNamespaceMiddleware;

    public function setUp()
    {
        $this->specNamespaceMiddleware = new SpecNamespaceMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
