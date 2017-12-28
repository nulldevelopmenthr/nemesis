<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecToStringMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecToStringMiddleware
 * @group  todo
 */
class SpecToStringMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecToStringMiddleware */
    private $specToStringMiddleware;

    public function setUp()
    {
        $this->specToStringMiddleware = new SpecToStringMiddleware(new ExampleMaker());
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
