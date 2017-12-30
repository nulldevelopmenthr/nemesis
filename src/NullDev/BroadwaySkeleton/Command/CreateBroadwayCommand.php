<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Webmozart\Assert\Assert;

/**
 * @see CreateBroadwayCommandSpec
 * @see CreateBroadwayCommandTest
 */
class CreateBroadwayCommand
{
    /** @var ClassType */
    private $classType;

    /** @var Parameter[]|array */
    private $parameters;

    public function __construct(ClassType $classType, array $parameters)
    {
        Assert::allIsInstanceOf($parameters, Parameter::class);

        $this->classType  = $classType;
        $this->parameters = $parameters;
    }

    public function getClassType(): ClassType
    {
        return $this->classType;
    }

    /** @return Parameter[]|array */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
