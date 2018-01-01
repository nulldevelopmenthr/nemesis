<?php

declare(strict_types=1);

namespace Tests\MyVendor;

use DateTime;
use MyVendor\User\UserCreatedAt;
use MyVendor\User\UserId;
use MyVendor\User\Username;
use MyVendor\UserEntity;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\UserEntity
 * @group  todo
 */
class UserEntityTest extends TestCase
{
    /** @var UserId */
    private $id;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var Username */
    private $username;

    /** @var bool */
    private $active;

    /** @var UserCreatedAt */
    private $createdAt;

    /** @var DateTime */
    private $updatedAt;

    /** @var UserEntity */
    private $sut;

    public function setUp()
    {
        $this->id        = new UserId(1);
        $this->firstName = 'firstName';
        $this->lastName  = 'lastName';
        $this->username  = new Username('username');
        $this->active    = true;
        $this->createdAt = new UserCreatedAt('2018-01-01T00:01:00+00:00');
        $this->updatedAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut       = new UserEntity($this->id, $this->firstName, $this->lastName, $this->username, $this->active, $this->createdAt, $this->updatedAt);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetFirstName()
    {
        self::assertSame($this->firstName, $this->sut->getFirstName());
    }

    public function testGetLastName()
    {
        self::assertSame($this->lastName, $this->sut->getLastName());
    }

    public function testGetUsername()
    {
        self::assertSame($this->username, $this->sut->getUsername());
    }

    public function testIsActive()
    {
        self::assertSame($this->active, $this->sut->isActive());
    }

    public function testGetCreatedAt()
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }

    public function testSerialize()
    {
        $expected = [
            'id'        => 1,
            'firstName' => 'firstName',
            'lastName'  => 'lastName',
            'username'  => 'username',
            'active'    => true,
            'createdAt' => '2018-01-01T00:01:00+00:00',
            'updatedAt' => '2018-01-01T00:01:00+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, UserEntity::deserialize(json_decode($serialized, true)));
    }
}
