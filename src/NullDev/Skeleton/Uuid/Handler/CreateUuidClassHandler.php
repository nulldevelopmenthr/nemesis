<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Handler;

use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;

/**
 * @see CreateUuidClassHandlerSpec
 * @see CreateUuidClassHandlerTest
 */
class CreateUuidClassHandler
{
    /** @var Uuid4IdentitySourceFactory */
    private $sourceFactory;

    public function __construct(Uuid4IdentitySourceFactory $sourceFactory)
    {
        $this->sourceFactory = $sourceFactory;
    }

    public function handle(CreateUuidClass $command): array
    {
        $classSource = $this->sourceFactory->create($command->getClassType());

        return [$classSource];
    }
}
