<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\CreateMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\CreateMethod
 * @group  nemesis
 */
class CreateMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var CreateMethod */
    private $createMethod;

    public function setUp(): void
    {
        $this->createMethod = new CreateMethod(new ClassType('name', 'namespace'), []);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
