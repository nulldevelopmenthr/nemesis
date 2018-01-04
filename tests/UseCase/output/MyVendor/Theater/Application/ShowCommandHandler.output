<?php

declare(strict_types=1);

namespace MyVendor\Theater\Application;

use Broadway\CommandHandling\SimpleCommandHandler;
use MyVendor\Theater\Core\ShowId;
use MyVendor\Theater\Domain\ShowModel;

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

    protected function load(ShowId $id): ShowModel
    {
        return $this->repository->load($id);
    }

    protected function save(ShowModel $model)
    {
        $this->repository->save($model);
    }
}
