<?php

declare(strict_types=1);

namespace Tests\MyVendor\Product;

use MyVendor\Product\ProductWeight;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Product\ProductWeight
 * @group  todo
 */
class ProductWeightTest extends TestCase
{
    /** @var int */
    private $weight;

    /** @var ProductWeight */
    private $sut;


    public function setUp()
    {
        $this->weight = 1;
        $this->sut = new ProductWeight($this->weight);
    }


    public function testGetWeight()
    {
        self::assertSame($this->weight, $this->sut->getWeight());
    }


    public function testToString()
    {
        self::assertSame((string) $this->weight, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->weight, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->weight));
    }
}
