<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\ClassMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\ClassMiddleware
 * @group todo
 */
class ClassMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ClassMiddleware */
    private $sut;

    public function setUp()
    {
        $this->sut = new ClassMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
