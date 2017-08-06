<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see CreateBroadwayModelSpec
 * @see CreateBroadwayModelTest
 */
class CreateBroadwayModel
{
    /** @var ClassType */
    private $modelIdType;
    /** @var ClassType */
    private $modelType;
    /** @var ClassType */
    private $repositoryType;

    public function __construct(ClassType $modelIdType, ClassType $modelType, ClassType $repositoryType)
    {
        $this->modelIdType    = $modelIdType;
        $this->modelType      = $modelType;
        $this->repositoryType = $repositoryType;
    }

    public function getModelIdType(): ClassType
    {
        return $this->modelIdType;
    }

    public function getModelType(): ClassType
    {
        return $this->modelType;
    }

    public function getRepositoryType(): ClassType
    {
        return $this->repositoryType;
    }

    public function getModelIdAsParameter(): Parameter
    {
        return new Parameter(lcfirst($this->modelIdType->getName()), $this->modelIdType);
    }
}
