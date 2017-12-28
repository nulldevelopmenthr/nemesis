<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Definition\PHP;

use NullDev\Skeleton\Definition\PHP\DocComment;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\DocComment
 * @group  unit
 */
class DocCommentTest extends TestCase
{
    /** @var DocComment */
    private $docComment;

    public function setUp(): void
    {
        $this->docComment = new DocComment();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('nothing to test');
    }
}
