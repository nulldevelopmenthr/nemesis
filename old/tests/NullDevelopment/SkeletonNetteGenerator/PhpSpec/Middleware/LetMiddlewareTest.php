<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\LetMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\LetMiddleware
 * @group  todo
 */
class LetMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var LetMiddleware */
    private $letMiddleware;

    public function setUp()
    {
        $this->letMiddleware = new LetMiddleware(new ExampleMaker());
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
