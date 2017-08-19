<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see CreateBroadwayElasticsearchReadProjectorSpec
 * @see CreateBroadwayElasticsearchReadProjectorTest
 */
class CreateBroadwayElasticsearchReadProjector
{
    /** @var ClassType */
    private $projectorClassType;
    /** @var array */
    private $entityParameters;

    public function __construct(ClassType $projectorClassType, array $entityParameters)
    {
        $this->projectorClassType  = $projectorClassType;
        $this->entityParameters    = $entityParameters;
    }

    public function getProjectorClassType(): ClassType
    {
        return $this->projectorClassType;
    }

    public function getEntityParameters(): array
    {
        return $this->entityParameters;
    }
}
