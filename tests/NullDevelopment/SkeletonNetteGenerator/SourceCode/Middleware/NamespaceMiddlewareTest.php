<?php

declare(strict_types=1);

namespace tests\NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\NamespaceMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\NamespaceMiddleware
 * @group todo
 */
class NamespaceMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var NamespaceMiddleware */
    private $sut;

    public function setUp()
    {
        $this->sut = new NamespaceMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
