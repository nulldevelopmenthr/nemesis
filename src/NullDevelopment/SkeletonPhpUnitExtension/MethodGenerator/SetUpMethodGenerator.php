<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpUnitExtension\Method\SetUpMethod;

/**
 * @see SetUpMethodGeneratorSpec
 * @see SetUpMethodGeneratorTest
 */
class SetUpMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SetUpMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $constructorArguments = [];
        foreach ($method->getParameters() as $parameter) {
            if (true === $parameter->isObject()) {
                $code->addBody(
                    sprintf(
                        '$this->%s = %s;',
                        $parameter->getName(),
                        $this->exampleMaker->instance($parameter)
                    )
                );
            } else {
                $code->addBody(
                    sprintf(
                        '$this->%s = %s;',
                        $parameter->getName(),
                        $this->exampleMaker->value($parameter)
                    )
                );
            }

            $constructorArguments[] = sprintf('$this->%s', $parameter->getName());
        }

        $code->addBody(
            sprintf('$this->sut = new %s(%s);', $method->getClassName()->getName(), implode(', ', $constructorArguments))
        );
    }
}
