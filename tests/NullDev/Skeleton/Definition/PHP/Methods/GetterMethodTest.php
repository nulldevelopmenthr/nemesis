<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Methods;

use Mockery;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\GetterMethod
 * @group nemesis
 */
class GetterMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var GetterMethod */
    private $getterMethod;

    public function setUp(): void
    {
        $this->getterMethod = new GetterMethod(Mockery::mock(Parameter::class));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
