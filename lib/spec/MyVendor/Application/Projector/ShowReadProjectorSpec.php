<?php

declare(strict_types=1);

namespace spec\MyVendor\Application\Projector;

use Broadway\ReadModel\Projector;
use MyVendor\Application\Factory\ShowReadFactory;
use MyVendor\Application\Projector\ShowReadProjector;
use MyVendor\Application\Repository\ShowReadRepository;
use PhpSpec\ObjectBehavior;

class ShowReadProjectorSpec extends ObjectBehavior
{
    public function let(ShowReadRepository $repository, ShowReadFactory $factory)
    {
        $this->beConstructedWith($repository, $factory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ShowReadProjector::class);
        $this->shouldHaveType(Projector::class);
    }
}
