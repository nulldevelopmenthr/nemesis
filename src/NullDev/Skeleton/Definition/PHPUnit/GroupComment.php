<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHPUnit;

use NullDev\Skeleton\Definition\PHP\DocComment;

/**
 * @GroupCommentSpec
 * @GroupCommentTest
 */
class GroupComment extends DocComment
{
    /** @var string */
    private $groupName;

    public function __construct(string $groupName)
    {
        $this->groupName = $groupName;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function __toString()
    {
        return '* @group '.$this->groupName;
    }
}
