<?php

declare(strict_types=1);

namespace Tests\MyVendor;

use DateTime;
use MyVendor\Product\ProductId;
use MyVendor\Product\ProductWeight;
use MyVendor\ProductCollection;
use MyVendor\ProductEntity;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class ProductCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var ProductCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [new ProductEntity(new ProductId(1), 'title', 'description', new ProductWeight(1), new DateTime('2018-01-01T00:01:00+00:00'))];
        $this->sut      = new ProductCollection($this->elements);
    }

    public function testGetElements()
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }

    public function testSerializeAndDeserialize()
    {
        $serialized     = $this->sut->serialize();
        $serializedJson = json_encode($serialized);
        self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));
    }
}
