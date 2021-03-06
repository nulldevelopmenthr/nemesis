<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\HasPropertyMethod;

/**
 * @see HasPropertyMethodGeneratorSpec
 * @see HasPropertyMethodGeneratorTest
 */
class HasPropertyMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof HasPropertyMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code
            ->addBody(sprintf('if(null === $this->%s){', $method->getPropertyName()))
            ->addBody('    return false;')
            ->addBody('}')
            ->addBody('')
            ->addBody('return true;');
    }

    public function getMethodGeneratorPriority(): int
    {
        return 60;
    }
}
