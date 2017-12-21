<?php

declare(strict_types=1);

namespace Tests\MyVendor\User;

use MyVendor\User\UserCreatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\User\UserCreatedAt
 * @group  todo
 */
class UserCreatedAtTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var UserCreatedAt */
    private $sut;

    public function setUp()
    {
        $this->value = '2018-01-01T11:22:33+00:00';
        $this->sut   = new UserCreatedAt($this->value);
    }

    public function testToString()
    {
        self::assertSame($this->value, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->value, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->value));
    }
}
