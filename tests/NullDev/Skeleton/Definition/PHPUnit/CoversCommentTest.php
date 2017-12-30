<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Definition\PHPUnit;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Definition\PHPUnit\CoversComment;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHPUnit\CoversComment
 * @group  todo
 */
class CoversCommentTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $className;

    /** @var CoversComment */
    private $sut;

    public function setUp()
    {
        $this->className = 'className';
        $this->sut       = new CoversComment($this->className);
    }

    public function testGetClassName()
    {
        self::assertEquals($this->className, $this->sut->getClassName());
    }

    public function testToString()
    {
        $this->markTestSkipped('Skipping');
    }
}
