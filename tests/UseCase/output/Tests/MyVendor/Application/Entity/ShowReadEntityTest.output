<?php

declare(strict_types=1);

namespace Tests\MyVendor\Application\Entity;

use DateTime;
use MyVendor\Application\Entity\ShowReadEntity;
use MyVendor\Theater\Core\ShowId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Application\Entity\ShowReadEntity
 * @group  todo
 */
class ShowReadEntityTest extends TestCase
{
    /** @var ShowId */
    private $id;

    /** @var string */
    private $title;

    /** @var string|null */
    private $description;

    /** @var DateTime */
    private $createdAt;

    /** @var DateTime */
    private $updatedAt;

    /** @var ShowReadEntity */
    private $sut;

    public function setUp()
    {
        $this->id          = new ShowId('id');
        $this->title       = 'title';
        $this->description = 'description';
        $this->createdAt   = new DateTime('2018-01-01T00:01:00+00:00');
        $this->updatedAt   = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut         = new ShowReadEntity(
            $this->id, $this->title, $this->description, $this->createdAt, $this->updatedAt
        );
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetTitle()
    {
        self::assertSame($this->title, $this->sut->getTitle());
    }

    public function testGetDescription()
    {
        self::assertSame($this->description, $this->sut->getDescription());
    }

    public function testGetCreatedAt()
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }

    public function testSetId()
    {
        $id = new ShowId('id');
        $this->sut->setId($id);
        self::assertSame($id, $this->sut->getId());
    }

    public function testSetTitle()
    {
        $title = 'title';
        $this->sut->setTitle($title);
        self::assertSame($title, $this->sut->getTitle());
    }

    public function testSetDescription()
    {
        $description = 'description';
        $this->sut->setDescription($description);
        self::assertSame($description, $this->sut->getDescription());
    }

    public function testSetCreatedAt()
    {
        $createdAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut->setCreatedAt($createdAt);
        self::assertSame($createdAt, $this->sut->getCreatedAt());
    }

    public function testSetUpdatedAt()
    {
        $updatedAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut->setUpdatedAt($updatedAt);
        self::assertSame($updatedAt, $this->sut->getUpdatedAt());
    }

    public function testHasDescription()
    {
        self::assertTrue($this->sut->hasDescription());
    }

    public function testSerialize()
    {
        $expected = [
            'id'          => 'id',
            'title'       => 'title',
            'description' => 'description',
            'createdAt'   => '2018-01-01T00:01:00+00:00',
            'updatedAt'   => '2018-01-01T00:01:00+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, ShowReadEntity::deserialize(json_decode($serialized, true)));
    }
}
