<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeSerializeMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeSerializeMethod
 * @group  todo
 */
class TestDateTimeSerializeMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestDateTimeSerializeMethod */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestDateTimeSerializeMethod();
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
