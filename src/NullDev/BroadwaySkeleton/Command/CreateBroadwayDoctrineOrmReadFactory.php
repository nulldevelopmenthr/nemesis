<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see CreateBroadwayDoctrineOrmReadFactorySpec
 * @see CreateBroadwayDoctrineOrmReadFactoryTest
 */
class CreateBroadwayDoctrineOrmReadFactory
{
    /** @var ClassType */
    private $factoryClassType;

    public function __construct(ClassType $factoryClassType)
    {
        $this->factoryClassType    = $factoryClassType;
    }

    public function getFactoryClassType(): ClassType
    {
        return $this->factoryClassType;
    }
}
