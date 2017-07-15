<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis\Xxx\PHPUnit\Definition\PHP\Methods;

use NullDev\Nemesis\Xxx\PHPUnit\Definition\PHP\Methods\SetUpMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Nemesis\Xxx\PHPUnit\Definition\PHP\Methods\SetUpMethod
 * @group nemesis
 */
class SetUpMethodTest extends PHPUnit_Framework_TestCase
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
