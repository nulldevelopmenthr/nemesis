<?php

declare(strict_types=1);

namespace MyVendor\Theater\Application;

use Broadway\CommandHandling\SimpleCommandHandler;

/**
 * @see \spec\MyVendor\Theater\Application\ShowCommandHandlerSpec
 * @see \Tests\MyVendor\Theater\Application\ShowCommandHandlerTest
 */
class ShowCommandHandler extends SimpleCommandHandler
{
    /** @var ShowRepository */
    private $repository;

    public function __construct(ShowRepository $repository)
    {
        $this->repository = $repository;
    }
}
