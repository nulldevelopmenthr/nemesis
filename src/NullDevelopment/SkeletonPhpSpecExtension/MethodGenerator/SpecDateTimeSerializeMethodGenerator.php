<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\BaseMethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeSerializeMethod;

/**
 * @see SpecDateTimeSerializeMethodGeneratorSpec
 * @see SpecDateTimeSerializeMethodGeneratorTest
 */
class SpecDateTimeSerializeMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecDateTimeSerializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody('$this->serialize()->shouldReturn(\'2018-01-01T11:22:33+00:00\');');
    }
}
