<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHPUnit;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Definition\PHPUnit\CoversComment;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHPUnit\CoversComment
 * @group  todo
 */
class CoversCommentTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $className;
    /** @var CoversComment */
    private $coversComment;

    public function setUp()
    {
        $this->className     = 'className';
        $this->coversComment = new CoversComment($this->className);
    }

    public function testGetClassName()
    {
        self::assertEquals($this->className, $this->coversComment->getClassName());
    }

    public function testToString()
    {
        $this->markTestSkipped('Skipping');
    }
}
