<?php

declare(strict_types=1);

namespace spec\MyVendor\Application\Entity;

use DateTime;
use MyVendor\Application\Entity\ShowReadEntity;
use MyVendor\Theater\Core\ShowId;
use PhpSpec\ObjectBehavior;

class ShowReadEntitySpec extends ObjectBehavior
{
    public function let(ShowId $id, DateTime $createdAt, DateTime $updatedAt)
    {
        $this->beConstructedWith($id, $title = 'title', $description = 'description', $createdAt, $updatedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ShowReadEntity::class);
    }

    public function it_exposes_id(ShowId $id)
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

    public function it_exposes_created_at(DateTime $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_exposes_updated_at(DateTime $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }

    public function it_can_set_id(ShowId $otherId)
    {
        $this->setId($otherId);
        $this->getId()->shouldReturn($otherId);
    }

    public function it_can_set_title()
    {
        $this->setTitle('otherTitle');
        $this->getTitle()->shouldReturn('otherTitle');
    }

    public function it_can_set_description()
    {
        $this->setDescription('otherDescription');
        $this->getDescription()->shouldReturn('otherDescription');
    }

    public function it_can_set_created_at(DateTime $otherCreatedAt)
    {
        $this->setCreatedAt($otherCreatedAt);
        $this->getCreatedAt()->shouldReturn($otherCreatedAt);
    }

    public function it_can_set_updated_at(DateTime $otherUpdatedAt)
    {
        $this->setUpdatedAt($otherUpdatedAt);
        $this->getUpdatedAt()->shouldReturn($otherUpdatedAt);
    }

    public function it_has_description()
    {
        $this->hasDescription()->shouldReturn(true);
    }

    public function it_can_be_serialized(ShowId $id, DateTime $createdAt, DateTime $updatedAt)
    {
        $id->serialize()->shouldBeCalled()->willReturn('id');
        $createdAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $updatedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            [
            'id'          => 'id',
            'title'       => 'title',
            'description' => 'description',
            'createdAt'   => '2018-01-01T00:01:00+00:00',
            'updatedAt'   => '2018-01-01T00:01:00+00:00',
        ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'          => 'id',
            'title'       => 'title',
            'description' => 'description',
            'createdAt'   => '2018-01-01T00:01:00+00:00',
            'updatedAt'   => '2018-01-01T00:01:00+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(ShowReadEntity::class);
    }
}
