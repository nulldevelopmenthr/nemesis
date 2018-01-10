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
                $value = $this->exampleMaker->instance($parameter);
            } else {
                $value = $this->exampleMaker->value($parameter);
            }

            $code->addBody(sprintf('$this->%s = %s;', $parameter->getName(), $value));

            $constructorArguments[] = sprintf('$this->%s', $parameter->getName());
        }

        $code->addBody(
            sprintf(
                '$this->sut = new %s(%s);',
                $method->getClassName()->getName(),
                implode(', ', $constructorArguments)
            )
        );
    }

    public function getMethodGeneratorPriority(): int
    {
        return 10;
    }
}
