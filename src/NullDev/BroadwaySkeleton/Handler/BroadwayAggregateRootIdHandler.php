<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootId;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;

/**
 * @see BroadwayAggregateRootIdHandlerSpec
 * @see BroadwayAggregateRootIdHandlerTest
 */
class BroadwayAggregateRootIdHandler
{
    /** @var Uuid4IdentitySourceFactory */
    private $uuid4IdentitySourceFactory;

    public function __construct(Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory)
    {
        $this->uuid4IdentitySourceFactory  = $uuid4IdentitySourceFactory;
    }

    public function handleCreateBroadwayAggregateRootId(CreateBroadwayAggregateRootId $command): array
    {
        return [
            $this->uuid4IdentitySourceFactory->create($command->getRootIdClassName()),
        ];
    }
}
