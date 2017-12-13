<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethod
 * @group  nemesis
 */
class ExposeGettersMethodTest extends TestCase
{
    /** @var ExposeGettersMethod */
    private $method;

    public function setUp(): void
    {
        $this->method = new ExposeGettersMethod([]);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
