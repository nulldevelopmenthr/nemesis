<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHPUnit;

use NullDev\Skeleton\Definition\PHPUnit\GroupComment;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHPUnit\GroupComment
 * @group nemesis
 */
class GroupCommentTest extends PHPUnit_Framework_TestCase
{
    /** @var GroupComment */
    private $groupComment;

    public function setUp(): void
    {
        $this->groupComment = new GroupComment('groupName');
    }

    public function testGetter(): void
    {
        self::assertEquals('groupName', $this->groupComment->getGroupName());
    }

    public function testCastToStringReturnsProperlyFormattedLineOfDocBlock(): void
    {
        self::assertEquals('* @group groupName', (string) $this->groupComment);
    }
}
