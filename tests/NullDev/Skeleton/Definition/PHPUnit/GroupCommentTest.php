<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHPUnit;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Definition\PHPUnit\GroupComment;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHPUnit\GroupComment
 * @group  todo
 */
class GroupCommentTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $groupName;
    /** @var GroupComment */
    private $groupComment;

    public function setUp()
    {
        $this->groupName    = 'groupName';
        $this->groupComment = new GroupComment($this->groupName);
    }

    public function testGetGroupName()
    {
        self::assertEquals($this->groupName, $this->groupComment->getGroupName());
    }

    public function testToString()
    {
        $this->markTestSkipped('Skipping');
    }
}
