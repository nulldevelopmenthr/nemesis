<?php

declare(strict_types=1);

namespace Tests\MyVendor\Product;

use MyVendor\Product\ProductId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Product\ProductId
 * @group  todo
 */
class ProductIdTest extends TestCase
{
    /** @var string */
    private $id;

    /** @var ProductId */
    private $sut;

    public function setUp()
    {
        $this->id  = 'id';
        $this->sut = new ProductId($this->id);
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
