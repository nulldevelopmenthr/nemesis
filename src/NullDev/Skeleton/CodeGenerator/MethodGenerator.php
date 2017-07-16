<?php

declare(strict_types=1);

namespace NullDev\Skeleton\CodeGenerator;

interface MethodGenerator
{
    public function supports($classMethod): bool;
}
