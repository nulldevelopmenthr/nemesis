<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\Method;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\Method\SpecCreateEventMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\BaseSpecMethodGenerator;

/**
 * @see SpecCreateEventMethodGeneratorSpec
 * @see SpecCreateEventMethodGeneratorTest
 */
class SpecCreateEventMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecCreateEventMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $values = [];

        foreach ($method->getParameters() as $parameter) {
            $values[] = '$'.$parameter->getName();
        }

        $code->addBody(
            sprintf(
                '$this->create(%s)->shouldReturnAnInstanceOf(%s::class);',
                implode(', ', $values),
                $method->getClassName()->getName()
            )
        );
    }

    public function getMethodGeneratorPriority(): int
    {
        return 20;
    }
}
