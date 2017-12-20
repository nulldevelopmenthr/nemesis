<?php

declare(strict_types=1);

namespace spec\MyVendor;

use MyVendor\ProductCollection;
use MyVendor\ProductEntity;
use MyVendor\Product\ProductId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductCollectionSpec extends ObjectBehavior
{
    public function let(ProductEntity $productEntity)
    {
        $this->beConstructedWith($elements = [$productEntity]);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(ProductCollection::class);
    }


    public function it_exposes_elements(ProductEntity $productEntity)
    {
        $this->toArray()->shouldReturn([$productEntity]);
    }


    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }


    public function it_supports_add_new_element(ProductEntity $anotherProductEntity)
    {
        $this->add($anotherProductEntity);
        $this->count()->shouldReturn(2);
    }


    public function it_knows_if_element_is_in_collection(ProductEntity $productEntity, ProductId $productId)
    {
        $productEntity->getId()->shouldBeCalled()->willReturn($productId);
        $this->has($productId)->shouldReturn(true);
    }


    public function it_can_return_element_from_collection_by_given_id(ProductEntity $productEntity, ProductId $productId)
    {
        $productEntity->getId()->shouldBeCalled()->willReturn($productId);
        $this->get($productId)->shouldReturn($productEntity);
    }
}
