<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\TypeFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeFactory
 * @group nemesis
 */
class TypeFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var TypeFactory */
    private $typeFactory;

    public function setUp(): void
    {
        $this->typeFactory = new TypeFactory();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
