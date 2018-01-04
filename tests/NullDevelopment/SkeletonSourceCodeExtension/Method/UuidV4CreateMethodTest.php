<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeExtension\Method\UuidV4CreateMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\Method\UuidV4CreateMethod
 * @group  todo
 */
class UuidV4CreateMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var UuidV4CreateMethod */
    private $sut;

    public function setUp()
    {
        $this->sut = new UuidV4CreateMethod();
    }

    public function testGetVisibility()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParameters()
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

    public function testGetImports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsStatic()
    {
        $this->markTestSkipped('Skipping');
    }
}
