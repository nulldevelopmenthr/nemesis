<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Uuid\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Uuid\Definition\PHP\Methods\UuidCreateMethod;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Uuid\Definition\PHP\Methods\UuidCreateMethod
 * @group  nemesis
 */
class UuidCreateMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var UuidCreateMethod */
    private $method;

    public function setUp(): void
    {
        $this->method = new UuidCreateMethod(new ClassType('SomeId', 'Vendor\Namespace'));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }

    public function testGetVisibility()
    {
        self::assertEquals('public', $this->method->getVisibility());
    }

    public function testIsStatic()
    {
        self::assertTrue($this->method->isStatic());
    }

    public function testGetMethodName()
    {
        self::assertEquals('create', $this->method->getMethodName());
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
        self::assertEquals('SomeId', $this->method->getMethodReturnType());
    }
}
