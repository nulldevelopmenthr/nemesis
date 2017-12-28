<?php

declare(strict_types=1);

namespace Tests\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod
 * @group  nemesis
 */
class SetUpMethodTest extends TestCase
{
    /** @var SetUpMethod */
    private $setUpMethod;

    public function setUp(): void
    {
        $this->setUpMethod = new SetUpMethod(new ImprovedClassSource(new ClassType('name', 'namespace')));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
