<?php

declare(strict_types=1);

namespace spec\MyVendor\Product;

use MyVendor\Product\ProductId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 1);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(ProductId::class);
    }


    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(1);
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('1');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn(1);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(1)->shouldReturnAnInstanceOf(ProductId::class);
    }
}
