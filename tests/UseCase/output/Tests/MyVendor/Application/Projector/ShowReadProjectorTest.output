<?php

declare(strict_types=1);

namespace Tests\MyVendor\Application\Projector;

use MyVendor\Application\Factory\ShowReadFactory;
use MyVendor\Application\Projector\ShowReadProjector;
use MyVendor\Application\Repository\ShowReadRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Application\Projector\ShowReadProjector
 * @group  todo
 */
class ShowReadProjectorTest extends TestCase
{
    /** @var ShowReadRepository */
    private $repository;

    /** @var ShowReadFactory */
    private $factory;

    /** @var ShowReadProjector */
    private $sut;

    public function setUp()
    {
        $this->repository = \Mockery::mock('MyVendor\Application\Repository\ShowReadRepository');
        $this->factory    = new ShowReadFactory();
        $this->sut        = new ShowReadProjector($this->repository, $this->factory);
    }
}
