<?php

declare(strict_types=1);

namespace Nesto\Domain;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Nesto\Core\MiroId;

class MiroModel extends EventSourcedAggregateRoot
{
    /** @var MiroId */
    private $miroId;

    public static function create(MiroId $miroId): MiroModel
    {
    }

    public function getAggregateRootId(): MiroId
    {
        return $this->miroId;
    }
}
