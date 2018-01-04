<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\Method;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ChainedGetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\Method\ChainedGetterMethod
 * @group  todo
 */
class ChainedGetterMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $name;

    /** @var MockInterface|GetterMethod */
    private $getterMethod;

    /** @var ChainedGetterMethod */
    private $sut;

    public function setUp()
    {
        $this->name         = 'name';
        $this->getterMethod = Mockery::mock(GetterMethod::class);
        $this->sut          = new ChainedGetterMethod($this->name, $this->getterMethod);
    }

    public function testGetGetterMethod()
    {
        self::assertEquals($this->getterMethod, $this->sut->getGetterMethod());
    }

    public function testGetPropertyName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetVisibility()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
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
