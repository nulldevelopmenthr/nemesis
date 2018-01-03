<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeDeserializeMethod;

/**
 * @see SpecDateTimeDeserializeMethodGeneratorSpec
 * @see SpecDateTimeDeserializeMethodGeneratorTest
 */
class SpecDateTimeDeserializeMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecDateTimeDeserializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            sprintf(
                '$this->deserialize(\'2018-01-01T11:22:33+00:00\')->shouldReturnAnInstanceOf(%s::class);',
                $method->getClassName()->getName()
            )
        );
    }

    public function getMethodGeneratorPriority(): int
    {
        return 96;
    }
}
