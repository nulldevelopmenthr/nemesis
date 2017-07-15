<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\UuidCreateMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\UuidCreateMethod
 * @group nemesis
 */
class UuidCreateMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var UuidCreateMethod */
    private $uuidCreateMethod;

    public function setUp(): void
    {
        $this->uuidCreateMethod = new UuidCreateMethod(new ClassType('name', 'namespace'));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
