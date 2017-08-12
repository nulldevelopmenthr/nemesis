<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestNothingMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestNothingMethod
 * @group  nemesis
 */
class TestNothingMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var TestNothingMethod */
    private $testNothingMethod;

    public function setUp(): void
    {
        $this->testNothingMethod = new TestNothingMethod(new ImprovedClassSource(new ClassType('name', 'namespace')));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
