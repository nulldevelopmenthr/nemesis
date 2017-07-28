<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeConstructorArgumentsAsGettersMethod;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeConstructorArgumentsAsGettersMethod
 * @group nemesis
 */
class ExposeConstructorArgumentsAsGettersMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var ExposeConstructorArgumentsAsGettersMethod */
    private $exposeConstructorArgumentsAsGettersMethod;

    public function setUp(): void
    {
        $this->exposeConstructorArgumentsAsGettersMethod = new ExposeConstructorArgumentsAsGettersMethod([]);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
