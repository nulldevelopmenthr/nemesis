<?php

declare(strict_types=1);

namespace Tests\MyVendor\Theater\Domain\Command;

use MyVendor\Theater\Core\Actor;
use MyVendor\Theater\Core\ShowId;
use MyVendor\Theater\Domain\Command\AddActorToCast;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Theater\Domain\Command\AddActorToCast
 * @group  todo
 */
class AddActorToCastTest extends TestCase
{
    /** @var ShowId */
    private $id;

    /** @var Actor */
    private $actor;

    /** @var AddActorToCast */
    private $sut;

    public function setUp()
    {
        $this->id    = new ShowId('id');
        $this->actor = new Actor(1);
        $this->sut   = new AddActorToCast($this->id, $this->actor);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetActor()
    {
        self::assertSame($this->actor, $this->sut->getActor());
    }

    public function testSerialize()
    {
        $expected = [
            'id'    => 'id',
            'actor' => 1,
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, AddActorToCast::deserialize(json_decode($serialized, true)));
    }
}
