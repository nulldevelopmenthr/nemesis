<?php

namespace tests\NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\TraitMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\TraitMiddleware
 * @group todo
 */
class TraitMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TraitMiddleware */
    private $sut;

    public function setUp()
    {
        $this->sut = new TraitMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
