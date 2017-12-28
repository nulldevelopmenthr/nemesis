<?php

declare(strict_types=1);

namespace tests\NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\InterfaceMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\InterfaceMiddleware
 * @group todo
 */
class InterfaceMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var InterfaceMiddleware */
    private $sut;

    public function setUp()
    {
        $this->sut = new InterfaceMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
