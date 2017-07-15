<?php

declare(strict_types=1);

namespace NullDev\Skeleton\CodeGenerator;

interface CodeGenerator
{
    public function supports($classMethod): bool;
}
