<?php

declare(strict_types=1);

namespace Tests\MyVendor\Theater\Core;

use MyVendor\Theater\Core\Actor;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Theater\Core\Actor
 * @group  todo
 */
class ActorTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var Actor */
    private $sut;

    public function setUp()
    {
        $this->id  = 1;
        $this->sut = new Actor($this->id);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testSerialize()
    {
        self::assertEquals($this->id, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->id));
    }
}
