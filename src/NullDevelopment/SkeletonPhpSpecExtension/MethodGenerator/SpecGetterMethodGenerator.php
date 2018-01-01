<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod;

/**
 * @see SpecGetterMethodGeneratorSpec
 * @see SpecGetterMethodGeneratorTest
 */
class SpecGetterMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecGetterMethod) {
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

        $code->addBody(
            sprintf('$this->%s()->shouldReturn(%s);', $method->getMethodUnderTest(), $value)
        );
    }
}
