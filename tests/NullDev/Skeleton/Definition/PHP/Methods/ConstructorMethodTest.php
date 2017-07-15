<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod
 * @group nemesis
 */
class ConstructorMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var ConstructorMethod */
    private $constructorMethod;

    public function setUp(): void
    {
        $this->constructorMethod = new ConstructorMethod([]);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
