<?php

declare(strict_types=1);

namespace tests\NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecMiddleware
 * @group  todo
 */
class SpecMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecMiddleware */
    private $specMiddleware;

    public function setUp()
    {
        $this->specMiddleware = new SpecMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
