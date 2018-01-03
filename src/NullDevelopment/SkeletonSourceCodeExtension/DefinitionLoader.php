<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension;

interface DefinitionLoader
{
    public function supports(array $input): bool;

    public function load(array $input);
}
