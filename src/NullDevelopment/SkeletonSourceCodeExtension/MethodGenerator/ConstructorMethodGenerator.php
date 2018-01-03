<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;

/**
 * @see ConstructorMethodGeneratorSpec
 * @see ConstructorMethodGeneratorTest
 */
class ConstructorMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof ConstructorMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        foreach ($method->getParameters() as $parameter) {
            $code->addBody(sprintf('$this->%s = $%s;', $parameter->getName(), $parameter->getName()));
        }
    }
}
