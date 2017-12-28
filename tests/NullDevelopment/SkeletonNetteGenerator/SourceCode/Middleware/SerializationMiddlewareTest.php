<?php

declare(strict_types=1);

namespace tests\NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\SerializationMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\SerializationMiddleware
 * @group todo
 */
class SerializationMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SerializationMiddleware */
    private $sut;

    public function setUp()
    {
        $this->sut = new SerializationMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
