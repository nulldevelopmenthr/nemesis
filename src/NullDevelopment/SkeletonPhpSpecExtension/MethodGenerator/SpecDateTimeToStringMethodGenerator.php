<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeToStringMethod;

/**
 * @see SpecDateTimeToStringMethodGeneratorSpec
 * @see SpecDateTimeToStringMethodGeneratorTest
 */
class SpecDateTimeToStringMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecDateTimeToStringMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody('$this->__toString()->shouldReturn(\'2018-01-01T11:22:33+00:00\');');
    }
}
