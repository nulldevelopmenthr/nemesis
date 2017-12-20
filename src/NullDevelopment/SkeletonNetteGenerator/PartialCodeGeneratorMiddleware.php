<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator;

interface PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next);
}
