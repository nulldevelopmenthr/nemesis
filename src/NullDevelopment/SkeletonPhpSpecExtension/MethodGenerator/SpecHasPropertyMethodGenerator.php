<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecHasPropertyMethod;

/**
 * @see SpecHasPropertyMethodGeneratorSpec
 * @see SpecHasPropertyMethodGeneratorTest
 */
class SpecHasPropertyMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecHasPropertyMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(sprintf('$this->%s()->shouldReturn(true);', $method->getMethodUnderTest()));
    }

    public function getMethodGeneratorPriority(): int
    {
        return 60;
    }
}
