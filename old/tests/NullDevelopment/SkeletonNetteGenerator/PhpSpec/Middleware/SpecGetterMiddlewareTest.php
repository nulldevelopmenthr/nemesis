<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecGetterMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecGetterMiddleware
 * @group  todo
 */
class SpecGetterMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecGetterMiddleware */
    private $specGetterMiddleware;

    public function setUp()
    {
        $this->specGetterMiddleware = new SpecGetterMiddleware(new ExampleMaker());
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
