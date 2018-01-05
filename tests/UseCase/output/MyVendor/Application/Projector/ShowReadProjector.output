<?php

declare(strict_types=1);

namespace MyVendor\Application\Projector;

use Broadway\ReadModel\Projector;
use MyVendor\Application\Factory\ShowReadFactory;
use MyVendor\Application\Repository\ShowReadRepository;

/**
 * @see \spec\MyVendor\Application\Projector\ShowReadProjectorSpec
 * @see \Tests\MyVendor\Application\Projector\ShowReadProjectorTest
 */
class ShowReadProjector extends Projector
{
    /** @var ShowReadRepository */
    private $repository;

    /** @var ShowReadFactory */
    private $factory;

    public function __construct(ShowReadRepository $repository, ShowReadFactory $factory)
    {
        $this->repository = $repository;
        $this->factory    = $factory;
    }
}
