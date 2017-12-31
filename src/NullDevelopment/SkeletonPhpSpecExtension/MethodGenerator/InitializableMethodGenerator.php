<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;

/**
 * @see InitializableMethodGeneratorSpec
 * @see InitializableMethodGeneratorTest
 */
class InitializableMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof InitializableMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            sprintf('$this->shouldHaveType(%s::class);', $method->getClassName()->getName())
        );

        if (null !== $method->getParentName()) {
            if (null === $method->getParentName()->getAlias()) {
                $className = $method->getParentName()->getName();
            } else {
                $className = $method->getParentName()->getAlias();
            }

            $code->addBody(
                sprintf('$this->shouldHaveType(%s::class);', $className)
            );
        }

        foreach ($method->getInterfaces() as $interface) {
            if (null === $interface->getAlias()) {
                $interfaceName = $interface->getName();
            } else {
                $interfaceName = $interface->getAlias();
            }

            $code->addBody(
                sprintf('$this->shouldImplement(%s::class);', $interfaceName)
            );
        }
    }
}
