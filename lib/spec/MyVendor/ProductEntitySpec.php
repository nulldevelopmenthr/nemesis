<?php

declare(strict_types=1);

namespace spec\MyVendor;

use DateTime;
use MyVendor\Product\ProductId;
use MyVendor\Product\ProductWeight;
use MyVendor\ProductEntity;
use PhpSpec\ObjectBehavior;

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

    public function it_exposes_updated_at(DateTime $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }

    public function it_can_be_serialized(ProductId $id, ProductWeight $weight, DateTime $updatedAt)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $weight->serialize()->shouldBeCalled()->willReturn(1);
        $updatedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn([
            'id'          => 1,
            'title'       => 'title',
            'description' => 'description',
            'weight'      => 1,
            'updatedAt'   => '2018-01-01T00:01:00+00:00',
        ]);
    }

    public function it_can_be_deserialized(ProductId $id, ProductWeight $weight, DateTime $updatedAt)
    {
        $input = [
            'id'          => 1,
            'title'       => 'title',
            'description' => 'description',
            'weight'      => 1,
            'updatedAt'   => '2018-01-01T00:01:00+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(ProductEntity::class);
    }
}
