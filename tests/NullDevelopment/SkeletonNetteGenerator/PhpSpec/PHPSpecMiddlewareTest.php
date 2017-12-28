<?php

declare(strict_types=1);

namespace tests\NullDevelopment\SkeletonNetteGenerator\PhpSpec;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\PHPSpecMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpSpec\PHPSpecMiddleware
 * @group todo
 */
class PHPSpecMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $generators;
    /** @var PHPSpecMiddleware */
    private $sut;

    public function setUp()
    {
        $this->generators = [];
        $this->sut        = new PHPSpecMiddleware($this->generators);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
