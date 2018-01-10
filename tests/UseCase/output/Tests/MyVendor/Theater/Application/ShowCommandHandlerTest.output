<?php

declare(strict_types=1);

namespace Tests\MyVendor\Theater\Application;

use MyVendor\Theater\Application\ShowCommandHandler;
use MyVendor\Theater\Application\ShowRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Theater\Application\ShowCommandHandler
 * @group  todo
 */
class ShowCommandHandlerTest extends TestCase
{
    /** @var ShowRepository */
    private $repository;

    /** @var ShowCommandHandler */
    private $sut;

    public function setUp()
    {
        $this->repository = new ShowRepository(
            \Mockery::mock('Broadway\EventStore\EventStore'),
            \Mockery::mock('Broadway\EventHandling\EventBus'),
            ['data']
        );
        $this->sut = new ShowCommandHandler($this->repository);
    }
}
