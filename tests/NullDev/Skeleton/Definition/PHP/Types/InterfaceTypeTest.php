<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\InterfaceType
 * @group nemesis
 */
class InterfaceTypeTest extends PHPUnit_Framework_TestCase
{
    /** @var InterfaceType */
    private $interfaceType;

    public function setUp(): void
    {
        $this->interfaceType = new InterfaceType('name', 'namespace');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
