<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see CreateBroadwayDoctrineOrmReadSpec
 * @see CreateBroadwayDoctrineOrmReadTest
 */
class CreateBroadwayDoctrineOrmRead
{
    /** @var ClassType */
    private $entityClassType;
    /** @var array */
    private $entityParameters;
    /** @var ClassType */
    private $repositoryClassType;
    /** @var ClassType */
    private $factoryClassType;
    /** @var ClassType */
    private $projectorClassType;

    public function __construct(
        ClassType $entityClassType,
        array $entityParameters,
        ClassType $repositoryClassType,
        ClassType $factoryClassType,
        ClassType $projectorClassType
    ) {
        $this->entityClassType     = $entityClassType;
        $this->entityParameters    = $entityParameters;
        $this->repositoryClassType = $repositoryClassType;
        $this->factoryClassType    = $factoryClassType;
        $this->projectorClassType  = $projectorClassType;
    }

    public function getEntityClassType(): ClassType
    {
        return $this->entityClassType;
    }

    public function getEntityParameters(): array
    {
        return $this->entityParameters;
    }

    public function getRepositoryClassType(): ClassType
    {
        return $this->repositoryClassType;
    }

    public function getFactoryClassType(): ClassType
    {
        return $this->factoryClassType;
    }

    public function getProjectorClassType(): ClassType
    {
        return $this->projectorClassType;
    }
}
