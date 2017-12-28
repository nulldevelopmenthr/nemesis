<?php

declare(strict_types=1);

namespace Tests\MyVendor\User;

use MyVendor\User\UserFirstName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\User\UserFirstName
 * @group  todo
 */
class UserFirstNameTest extends TestCase
{
    /** @var string */
    private $firstName;

    /** @var UserFirstName */
    private $sut;

    public function setUp()
    {
        $this->firstName = 'firstName';
        $this->sut       = new UserFirstName($this->firstName);
    }

    public function testGetFirstName()
    {
        self::assertSame($this->firstName, $this->sut->getFirstName());
    }

    public function testGetValue()
    {
        self::assertSame($this->firstName, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->firstName, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->firstName, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->firstName));
    }
}
