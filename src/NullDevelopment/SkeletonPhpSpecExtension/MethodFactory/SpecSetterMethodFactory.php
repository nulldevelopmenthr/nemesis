<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecSetterMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SetterMethod;

/**
 * @see SpecSetterMethodFactorySpec
 * @see SpecSetterMethodFactoryTest
 */
class SpecSetterMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof SetterMethod) {
                $methods[] = $this->createFromSetterMethod($method);
            }
        }

        return $methods;
    }

    public function createFromSetterMethod(SetterMethod $method): SpecSetterMethod
    {
        $methodName = $method->getName();
        if (preg_match('/get(?<methodName>.*)/', $methodName, $matches)) {
            $methodName = $matches['methodName'];
        }

        $snakeCasePropertyName = strtolower(preg_replace('/[A-Z]/', '_\\0', lcfirst($methodName)));

        $anotherProperty = new Property(
            'other'.ucfirst($method->getProperty()->getName()),
            $method->getProperty()->getInstanceName(),
            $method->getProperty()->isNullable(),
            $method->getProperty()->hasDefaultValue(),
            $method->getProperty()->getDefaultValue(),
            $method->getProperty()->getVisibility(),
            $method->getProperty()->getExamples()
        );

        if ('bool' === $method->getProperty()->getInstanceNameAsString()) {
            $getterMethodName = 'is'.ucfirst($method->getProperty()->getName());
        } else {
            $getterMethodName = 'get'.ucfirst($method->getProperty()->getName());
        }

        return new SpecSetterMethod(
            'it_can_'.$snakeCasePropertyName, $method->getName(), $anotherProperty, $getterMethodName
        );
    }
}
