<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeLetMethod;

/**
 * @see SpecDateTimeLetMethodGeneratorSpec
 * @see SpecDateTimeLetMethodGeneratorTest
 */
class SpecDateTimeLetMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecDateTimeLetMethod) {
            return true;
        }

        return false;
    }

    /** @SuppressWarnings("PHPMD.UnusedFormalParameter") */
    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody('$this->beConstructedWith(\'2018-01-01T11:22:33+00:00\');');
    }

    public function getMethodGeneratorPriority(): int
    {
        return 10;
    }
}
