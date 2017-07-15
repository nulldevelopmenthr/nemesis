<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Methods;

use Mockery;
use NullDev\Skeleton\Definition\PHP\Methods\SerializeMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\SerializeMethod
 * @group nemesis
 */
class SerializeMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var SerializeMethod */
    private $serializeMethod;

    public function setUp(): void
    {
        $this->serializeMethod = new SerializeMethod(Mockery::mock(ImprovedClassSource::class));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
