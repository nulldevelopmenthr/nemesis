<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode;

interface DefinitionLoader
{
    public function supports(array $input): bool;

    public function load(array $input);
}
