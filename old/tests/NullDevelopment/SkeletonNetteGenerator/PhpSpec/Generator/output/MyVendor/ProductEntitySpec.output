<?php

declare(strict_types=1);

namespace spec\MyVendor;

use DateTime;
use MyVendor\ProductEntity;
use MyVendor\Product\ProductId;
use MyVendor\Product\ProductWeight;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductEntitySpec extends ObjectBehavior
{
    public function let(ProductId $id, ProductWeight $weight, DateTime $updatedAt)
    {
        $this->beConstructedWith($id, $title = 'title', $description = 'description', $weight, $updatedAt);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(ProductEntity::class);
    }


    public function it_exposes_id(ProductId $id)
    {
        $this->getId()->shouldReturn($id);
    }


    public function it_exposes_title()
    {
        $this->getTitle()->shouldReturn('title');
    }


    public function it_exposes_description()
    {
        $this->getDescription()->shouldReturn('description');
    }


    public function it_exposes_weight(ProductWeight $weight)
    {
        $this->getWeight()->shouldReturn($weight);
    }


    public function it_exposes_updatedAt(DateTime $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }


    public function it_is_serializable(ProductId $id, ProductWeight $weight, DateTime $updatedAt)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $weight->serialize()->shouldBeCalled()->willReturn(1);
        $updatedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01 00:01:00');
        $this->serialize()->shouldReturn(['id' => 1, 'title' => 'title', 'description' => 'description', 'weight' => 1, 'updatedAt' => '2018-01-01 00:01:00']);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['id' => 1, 'title' => 'title', 'description' => 'description', 'weight' => 1, 'updatedAt' => '2018-01-01 00:01:00'])->shouldReturnAnInstanceOf(ProductEntity::class);
    }
}
