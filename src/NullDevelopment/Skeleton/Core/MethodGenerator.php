<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core;

use NullDevelopment\PhpStructure\Behaviour\Method;

interface MethodGenerator
{
    public function supports(Method $method): bool;

    public function generate(Method $method);

    public function generateAsString(Method $method): string;

    public function getMethodGeneratorPriority(): int;
}
