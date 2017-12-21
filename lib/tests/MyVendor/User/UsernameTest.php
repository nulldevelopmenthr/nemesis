<?php

declare(strict_types=1);

namespace Tests\MyVendor\User;

use MyVendor\User\Username;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\User\Username
 * @group  todo
 */
class UsernameTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var Username */
    private $sut;

    public function setUp()
    {
        $this->value = 'value';
        $this->sut   = new Username($this->value);
    }

    public function testGetValue()
    {
        self::assertSame($this->value, $this->sut->getValue());
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
