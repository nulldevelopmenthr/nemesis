<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod
 * @group  nemesis
 */
class ToStringMethodTest extends TestCase
{
    /** @var ToStringMethod */
    private $method;

    public function setUp(): void
    {
        $parameter    = Parameter::create('firstName', 'Vendor\User\FirstName');
        $this->method = new ToStringMethod($parameter);
    }

    public function testGetPropertyName()
    {
        self::assertEquals('firstName', $this->method->getPropertyName());
    }

    public function testGetVisibility()
    {
        self::assertEquals('public', $this->method->getVisibility());
    }

    public function testIsStatic()
    {
        self::assertFalse($this->method->isStatic());
    }

    public function testGetMethodName()
    {
        self::assertEquals('__toString', $this->method->getMethodName());
    }

    public function testGetMethodParameters()
    {
        self::assertEmpty($this->method->getMethodParameters());
    }

    public function testHasMethodReturnType()
    {
        self::assertTrue($this->method->hasMethodReturnType());
    }

    public function testGetMethodReturnType()
    {
        self::assertEquals('string', $this->method->getMethodReturnType());
    }
}
