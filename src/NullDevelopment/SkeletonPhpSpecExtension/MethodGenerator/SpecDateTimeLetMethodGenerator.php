<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeLetMethod;

/**
 * @see SpecDateTimeLetMethodGeneratorSpec
 * @see SpecDateTimeLetMethodGeneratorTest
 */
class SpecDateTimeLetMethodGenerator implements MethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecDateTimeLetMethod) {
            return true;
        }

        return false;
    }

    public function generateAsString(Method $method): string
    {
        $code = $this->generate($method);

        return $code->__toString();
    }

    public function generate(Method $method): NetteMethod
    {
        $code = new NetteMethod($method->getName());

        $code->setVisibility((string) $method->getVisibility());

        if ('' !== $method->getReturnType()) {
            $code->setReturnType($method->getReturnType());
            $code->setReturnNullable($method->isNullableReturnType());
        }

        foreach ($method->getParameters() as $parameter) {
            if (true === $parameter->isObject()) {
                $code->addParameter($parameter->getName())
                    ->setTypeHint($parameter->getInstanceNameAsString());
            }
        }

        $this->generateMethodBody($method, $code);

        return $code;
    }

    /** @SuppressWarnings("PHPMD.UnusedFormalParameter") */
    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody('$this->beConstructedWith(\'2018-01-01T11:22:33+00:00\');');
    }
}
