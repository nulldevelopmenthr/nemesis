<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Definition\PHPUnit;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Definition\PHPUnit\GroupComment;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHPUnit\GroupComment
 * @group  todo
 */
class GroupCommentTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $groupName;

    /** @var GroupComment */
    private $sut;

    public function setUp()
    {
        $this->groupName = 'groupName';
        $this->sut       = new GroupComment($this->groupName);
    }

    public function testGetGroupName()
    {
        self::assertEquals($this->groupName, $this->sut->getGroupName());
    }

    public function testToString()
    {
        $this->markTestSkipped('Skipping');
    }
}
