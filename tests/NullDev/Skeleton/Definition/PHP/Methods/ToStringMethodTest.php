<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Methods;

use Mockery;
use NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod
 * @group nemesis
 */
class ToStringMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var ToStringMethod */
    private $toStringMethod;

    public function setUp(): void
    {
        $this->toStringMethod = new ToStringMethod(Mockery::mock(Parameter::class));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
