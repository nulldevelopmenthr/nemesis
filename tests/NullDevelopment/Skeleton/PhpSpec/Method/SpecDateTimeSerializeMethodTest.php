<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeSerializeMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeSerializeMethod
 * @group  todo
 */
class SpecDateTimeSerializeMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecDateTimeSerializeMethod */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeSerializeMethod();
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
