<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see CreateBroadwayCommandSpec
 * @see CreateBroadwayCommandTest
 */
class CreateBroadwayCommand
{
    /** @var ClassType */
    private $classType;
    /** @var array */
    private $parameters;

    public function __construct(ClassType $classType, array $parameters)
    {
        $this->classType  = $classType;
        $this->parameters = $parameters;
    }

    public function getClassType(): ClassType
    {
        return $this->classType;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
