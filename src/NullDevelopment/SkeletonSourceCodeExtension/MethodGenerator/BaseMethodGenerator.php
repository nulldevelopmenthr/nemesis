<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\Core\MethodGenerator;

/** @SuppressWarnings("PHPMD.NumberOfChildren") */
abstract class BaseMethodGenerator implements MethodGenerator
{
    public function generateAsString(ClassType $netteCode, Method $method): string
    {
        $code = $this->generate($netteCode, $method);

        return $code->__toString();
    }

    public function generate(ClassType $netteCode, Method $method)
    {
        $code = $netteCode->addMethod($method->getName());

        $code->setVisibility((string) $method->getVisibility());
        $code->setStatic($method->isStatic());

        if ('' !== $method->getReturnType()) {
            $code->setReturnType($method->getReturnType());
            $code->setReturnNullable($method->isNullableReturnType());
        }

        foreach ($method->getParameters() as $parameter) {
            $parameterCode = $code->addParameter($parameter->getName())
                ->setTypeHint($parameter->getInstanceFullName());

            if (true === $parameter->isNullable()) {
                $parameterCode->setNullable(true);
            }

            if (true === $parameter->hasDefaultValue()) {
                $parameterCode->setDefaultValue($parameter->getDefaultValue());
            }
        }

        $this->generateMethodBody($method, $code);

        return $code;
    }

    abstract protected function generateMethodBody($method, NetteMethod $code);
}
