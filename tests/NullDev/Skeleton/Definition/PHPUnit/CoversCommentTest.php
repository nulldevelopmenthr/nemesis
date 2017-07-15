<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHPUnit;

use NullDev\Skeleton\Definition\PHPUnit\CoversComment;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHPUnit\CoversComment
 * @group nemesis
 */
class CoversCommentTest extends PHPUnit_Framework_TestCase
{
    /** @var CoversComment */
    private $coversComment;

    public function setUp(): void
    {
        $this->coversComment = new CoversComment('className');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}