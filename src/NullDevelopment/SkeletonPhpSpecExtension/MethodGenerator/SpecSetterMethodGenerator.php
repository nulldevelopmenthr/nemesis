<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecSetterMethod;

/**
 * @see SpecSetterMethodGeneratorSpec
 * @see SpecSetterMethodGeneratorTest
 */
class SpecSetterMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecSetterMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (true === $method->getProperty()->isObject()) {
            $value = '$'.$method->getPropertyName();
        } else {
            $value = (string) $this->exampleMaker->value($method->getProperty());
        }

        if ('bool' === $method->getProperty()->getInstanceNameAsString()) {
            $getterMethodName = 'is'.ucfirst($method->getProperty()->getName());
        } else {
            $getterMethodName = 'get'.ucfirst($method->getProperty()->getName());
        }

        $code
            ->addBody(sprintf('$this->%s(%s);', $method->getMethodUnderTest(), $value))
            ->addBody(sprintf('$this->%s()->shouldReturn(%s);', $getterMethodName, $value));
    }

    public function getMethodGeneratorPriority(): int
    {
        return 50;
    }
}
