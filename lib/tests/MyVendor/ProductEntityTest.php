<?php

declare(strict_types=1);

namespace Tests\MyVendor;

use DateTime;
use MyVendor\Product\ProductId;
use MyVendor\Product\ProductWeight;
use MyVendor\ProductEntity;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class ProductEntityTest extends TestCase
{
    /** @var ProductId */
    private $id;

    /** @var string */
    private $title;

    /** @var string|null */
    private $description;

    /** @var ProductWeight|null */
    private $weight;

    /** @var DateTime */
    private $updatedAt;

    /** @var ProductEntity */
    private $sut;

    public function setUp()
    {
        $this->id          = new ProductId(1);
        $this->title       = 'title';
        $this->description = 'description';
        $this->weight      = new ProductWeight(1);
        $this->updatedAt   = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut         = new ProductEntity($this->id, $this->title, $this->description, $this->weight, $this->updatedAt);
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

    public function testGetWeight()
    {
        self::assertSame($this->weight, $this->sut->getWeight());
    }

    public function testGetUpdatedAt()
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }

    public function testSerialize()
    {
        $expected = [
            'id'         => 1,
            'title'      => 'title',
            'description'=> 'description',
            'weight'     => 1,
            'updatedAt'  => '2018-01-01T00:01:00+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, ProductEntity::deserialize(json_decode($serialized, true)));
    }
}
