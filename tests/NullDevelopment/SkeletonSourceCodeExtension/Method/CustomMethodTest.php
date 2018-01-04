<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeExtension\Method\CustomMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\Method\CustomMethod
 * @group  todo
 */
class CustomMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $name;

    /** @var array */
    private $parameters;

    /** @var array */
    private $body;

    /** @var CustomMethod */
    private $sut;

    public function setUp()
    {
        $this->name       = 'name';
        $this->parameters = [];
        $this->body       = [];
        $this->sut        = new CustomMethod($this->name, $this->parameters, $this->body);
    }

    public function testSetVisibility()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetIsNullableReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetImports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetVisibility()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParameters()
    {
        self::assertEquals($this->parameters, $this->sut->getParameters());
    }

    public function testGetReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsNullableReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetBody()
    {
        self::assertEquals($this->body, $this->sut->getBody());
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
