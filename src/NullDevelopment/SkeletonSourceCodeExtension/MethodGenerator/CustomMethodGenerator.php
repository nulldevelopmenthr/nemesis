<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\CustomMethod;

/**
 * @see CustomMethodGeneratorSpec
 * @see CustomMethodGeneratorTest
 */
class CustomMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof CustomMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        foreach ($method->getBody() as $item) {
            $code->addBody($item);
        }
    }

    public function getMethodGeneratorPriority(): int
    {
        return 70;
    }
}
