<?php

declare(strict_types=1);

namespace Tests\MyVendor\Theater\Domain\Event;

use DateTime;
use MyVendor\Theater\Core\Actor;
use MyVendor\Theater\Core\ShowId;
use MyVendor\Theater\Domain\Event\ActorAddedToCast;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Theater\Domain\Event\ActorAddedToCast
 * @group  todo
 */
class ActorAddedToCastTest extends TestCase
{
    /** @var ShowId */
    private $id;

    /** @var Actor */
    private $actor;

    /** @var DateTime */
    private $addedAt;

    /** @var ActorAddedToCast */
    private $sut;

    public function setUp()
    {
        $this->id      = new ShowId('id');
        $this->actor   = new Actor(1);
        $this->addedAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut     = new ActorAddedToCast($this->id, $this->actor, $this->addedAt);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetActor()
    {
        self::assertSame($this->actor, $this->sut->getActor());
    }

    public function testGetAddedAt()
    {
        self::assertSame($this->addedAt, $this->sut->getAddedAt());
    }

    public function testSerialize()
    {
        $expected = [
            'id'      => 'id',
            'actor'   => 1,
            'addedAt' => '2018-01-01T00:01:00+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, ActorAddedToCast::deserialize(json_decode($serialized, true)));
    }
}
