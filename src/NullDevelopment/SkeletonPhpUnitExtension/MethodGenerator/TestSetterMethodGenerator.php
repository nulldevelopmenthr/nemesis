<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestSetterMethod;

/**
 * @see TestSetterMethodGeneratorSpec
 * @see TestSetterMethodGeneratorTest
 */
class TestSetterMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestSetterMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $property     = $method->getProperty();
        $propertyName = $property->getName();

        if ('bool' === $property->getInstanceNameAsString()) {
            $getterMethodName = 'is'.ucfirst($property->getName());
        } else {
            $getterMethodName = 'get'.ucfirst($property->getName());
        }

        $code
            ->addBody(sprintf('$%s = %s;', $propertyName, $this->exampleMaker->instance($property)))
            ->addBody(sprintf('$this->sut->%s($%s);', $method->getMethodUnderTest(), $propertyName));

        $code->addBody(
            sprintf('self::assertSame($%s, $this->sut->%s());', $propertyName, $getterMethodName)
        );
    }

    public function getMethodGeneratorPriority(): int
    {
        return 50;
    }
}
