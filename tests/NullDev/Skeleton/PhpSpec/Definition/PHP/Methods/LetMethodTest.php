<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\PhpSpec\Definition\PHP\Methods;

use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\LetMethod;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\LetMethod
 * @group nemesis
 */
class LetMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var LetMethod */
    private $letMethod;

    public function setUp(): void
    {
        $this->letMethod = new LetMethod([]);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
