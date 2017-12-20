<?php

declare(strict_types=1);

namespace spec\MyVendor\Product;

use MyVendor\Product\ProductWeight;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductWeightSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($weight = 1);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(ProductWeight::class);
    }


    public function it_exposes_weight()
    {
        $this->getWeight()->shouldReturn(1);
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
        $this->deserialize(1)->shouldReturnAnInstanceOf(ProductWeight::class);
    }
}
