<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod
 * @group  unit
 */
class InitializableMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ClassName */
    private $className;
    /** @var null|ClassName */
    private $parentName;
    /** @var array */
    private $interfaces;
    /** @var InitializableMethod */
    private $sut;

    public function setUp()
    {
        $this->className  = ClassName::create('MyVendor\\Customers\\User');
        $this->parentName = null;
        $this->interfaces = [InterfaceName::create('MyVendor\\SomeInterface')];
        $this->sut        = new InitializableMethod($this->className, $this->parentName, $this->interfaces);
    }

    public function testGetClassName()
    {
        self::assertEquals($this->className, $this->sut->getClassName());
    }

    public function testGetParentName()
    {
        self::assertEquals($this->parentName, $this->sut->getParentName());
    }

    public function testGetInterfaces()
    {
        self::assertEquals($this->interfaces, $this->sut->getInterfaces());
    }

    public function testGetName()
    {
        self::assertEquals('it_is_initializable', $this->sut->getName());
    }

    public function testGetParameters()
    {
        self::assertEquals([], $this->sut->getParameters());
    }

    public function testGetVisibility()
    {
        self::assertEquals(new Visibility('public'), $this->sut->getVisibility());
    }

    public function testGetReturnType()
    {
        self::assertEquals('', $this->sut->getReturnType());
    }

    public function testIsNullableReturnType()
    {
        self::assertFalse($this->sut->isNullableReturnType());
    }
}
