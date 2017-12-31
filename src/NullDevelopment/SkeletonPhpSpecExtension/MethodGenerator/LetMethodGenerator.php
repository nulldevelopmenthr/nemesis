<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;

/**
 * @see LetMethodGeneratorSpec
 * @see LetMethodGeneratorTest
 */
class LetMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof LetMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $parameters = [];

        foreach ($method->getParameters() as $parameter) {
            if (true === $parameter->isObject()) {
                $parameters[] = '$'.$parameter->getName();
            } else {
                $parameters[] = sprintf('$%s = %s', $parameter->getName(), $this->exampleMaker->value($parameter));
            }
        }

        $code->addBody(sprintf('$this->beConstructedWith(%s);', implode(', ', $parameters)));
    }
}
