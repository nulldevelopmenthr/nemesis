<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\DeserializeMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\DeserializeMethod
 * @group nemesis
 */
class DeserializeMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var DeserializeMethod */
    private $deserializeMethod;

    public function setUp(): void
    {
        $this->deserializeMethod = new DeserializeMethod(new ImprovedClassSource(new ClassType('name', 'namespace')));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
