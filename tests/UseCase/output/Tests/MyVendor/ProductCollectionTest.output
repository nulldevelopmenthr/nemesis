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
 * @covers \MyVendor\ProductCollection
 * @group  todo
 */
class ProductCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var ProductCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [
            new ProductEntity(new ProductId('id'), 'title', 'description', new ProductWeight(1), new DateTime('2018-01-01T00:01:00+00:00')),
        ];
        $this->sut = new ProductCollection($this->elements);
    }

    public function testGetElements()
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }
}
