<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see CreateUuidClassSpec
 * @see CreateUuidClassTest
 */
class CreateUuidClass
{
    /** @var ClassType */
    private $classType;

    public function __construct(ClassType $classType)
    {
        $this->classType = $classType;
    }

    public function getClassType(): ClassType
    {
        return $this->classType;
    }
}
