<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see CreateBroadwayElasticsearchReadRepositorySpec
 * @see CreateBroadwayElasticsearchReadRepositoryTest
 */
class CreateBroadwayElasticsearchReadRepository
{
    /** @var ClassType */
    private $repositoryClassType;

    public function __construct(ClassType $repositoryClassType)
    {
        $this->repositoryClassType = $repositoryClassType;
    }

    public function getRepositoryClassType(): ClassType
    {
        return $this->repositoryClassType;
    }
}
