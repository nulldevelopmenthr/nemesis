<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension;

use NullDevelopment\PhpStructure\Behaviour\Method;

interface MethodGenerator
{
    public function supports(Method $method): bool;

    public function generate(Method $method);

    public function generateAsString(Method $method): string;
}
