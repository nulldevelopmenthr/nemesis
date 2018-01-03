<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension;

use NullDevelopment\PhpStructure\Type\Definition;

interface DefinitionGenerator
{
    public function supports(Definition $definition): bool;

    public function generate(Definition $definition);

    public function generateAsString(Definition $definition): string;
}
