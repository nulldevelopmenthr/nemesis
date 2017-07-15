<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\ClassType
 * @group nemesis
 */
class ClassTypeTest extends PHPUnit_Framework_TestCase
{
    /** @var ClassType */
    private $classType;

    public function setUp(): void
    {
        $this->classType = new ClassType('name', 'namespace');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
