<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethod;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethod
 * @group nemesis
 */
class InitializableMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var InitializableMethod */
    private $method;

    public function setUp(): void
    {
        $this->method = new InitializableMethod([]);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}