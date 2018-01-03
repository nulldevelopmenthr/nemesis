<?php

declare(strict_types=1);

namespace Tests\MyVendor\Theater\Core;

use MyVendor\Theater\Core\ShowId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Theater\Core\ShowId
 * @group  todo
 */
class ShowIdTest extends TestCase
{
    /** @var string */
    private $id;

    /** @var ShowId */
    private $sut;

    public function setUp()
    {
        $this->id  = 'id';
        $this->sut = new ShowId($this->id);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testToString()
    {
        self::assertSame($this->id, $this->sut->__toString());
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
