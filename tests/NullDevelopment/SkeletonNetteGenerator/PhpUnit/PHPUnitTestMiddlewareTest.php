<?php

namespace tests\NullDevelopment\SkeletonNetteGenerator\PhpUnit;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\PHPUnitTestMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpUnit\PHPUnitTestMiddleware
 * @group todo
 */
class PHPUnitTestMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $generators;
    /** @var PHPUnitTestMiddleware */
    private $sut;

    public function setUp()
    {
        $this->generators = [];
        $this->sut        = new PHPUnitTestMiddleware($this->generators);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
