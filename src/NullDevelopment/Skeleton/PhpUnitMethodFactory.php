<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;

interface PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array;
}
