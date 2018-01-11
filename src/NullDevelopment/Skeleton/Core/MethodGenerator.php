<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core;

use Nette\PhpGenerator\ClassType;
use NullDevelopment\PhpStructure\Behaviour\Method;

interface MethodGenerator
{
    public function supports(Method $method): bool;

    public function generate(ClassType $netteCode, Method $method);

    public function generateAsString(ClassType $netteCode, Method $method): string;

    public function getMethodGeneratorPriority(): int;
}
