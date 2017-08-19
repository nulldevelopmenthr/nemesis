<?php

declare(strict_types=1);

namespace Nesto\Application;

use Nesto\Core\MiroId;
use Nesto\Domain\MiroModel;
use Nesto\Domain\MiroRepository;

class MiroCommandHandler
{
    /** @var MiroRepository */
    private $repository;

    public function __construct(MiroRepository $repository)
    {
        $this->repository = $repository;
    }

    private function load(MiroId $id): MiroModel
    {
        return $this->repository->load($id);
    }

    private function save(MiroModel $model)
    {
        $this->repository->save($model);
    }
}
