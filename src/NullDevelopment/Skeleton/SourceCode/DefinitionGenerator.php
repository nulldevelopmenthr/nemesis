<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode;

use NullDevelopment\PhpStructure\Type\ClassType;

interface DefinitionGenerator
{
    public function supports(ClassType $definition): bool;

    public function generate(ClassType $definition);

    public function generateAsString(ClassType $definition): string;
}
