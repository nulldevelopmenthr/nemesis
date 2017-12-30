<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeToStringMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeToStringMethod
 * @group  todo
 */
class SpecDateTimeToStringMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecDateTimeToStringMethod */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeToStringMethod();
    }

    public function testGetName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParameters()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetImports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetVisibility()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsNullableReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsStatic()
    {
        $this->markTestSkipped('Skipping');
    }
}
