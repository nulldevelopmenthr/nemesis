<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see CreateBroadwayElasticsearchReadEntitySpec
 * @see CreateBroadwayElasticsearchReadEntityTest
 */
class CreateBroadwayElasticsearchReadEntity
{
    /** @var ClassType */
    private $entityClassType;
    /** @var array */
    private $entityParameters;

    public function __construct(ClassType $entityClassType, array $entityParameters)
    {
        $this->entityClassType  = $entityClassType;
        $this->entityParameters = $entityParameters;
    }

    public function getEntityClassType(): ClassType
    {
        return $this->entityClassType;
    }

    public function getEntityParameters(): array
    {
        return $this->entityParameters;
    }
}
