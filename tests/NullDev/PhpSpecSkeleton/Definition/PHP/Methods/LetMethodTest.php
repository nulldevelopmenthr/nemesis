<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethod;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethod
 * @group nemesis
 */
class LetMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var LetMethod */
    private $method;

    public function setUp(): void
    {
        $this->method = new LetMethod([]);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
