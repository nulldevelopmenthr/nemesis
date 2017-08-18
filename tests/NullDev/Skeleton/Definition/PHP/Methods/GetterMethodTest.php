<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Property;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\GetterMethod
 * @group  nemesis
 */
class GetterMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var GetterMethod */
    private $method;

    public function setUp(): void
    {
        $property     = Property::create('firstName', 'Vendor\User\FirstName');
        $this->method = GetterMethod::create($property);
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
        self::assertEquals('getFirstName', $this->method->getMethodName());
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
        self::assertEquals('FirstName', $this->method->getMethodReturnType());
    }
}
