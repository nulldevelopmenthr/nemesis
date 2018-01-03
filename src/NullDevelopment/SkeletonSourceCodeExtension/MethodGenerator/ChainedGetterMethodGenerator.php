<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ChainedGetterMethod;

/**
 * @see ChainedGetterMethodGeneratorSpec
 * @see ChainedGetterMethodGeneratorTest
 */
class ChainedGetterMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof ChainedGetterMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            sprintf('return $this->%s->%s();', $method->getPropertyName(), $method->getGetterMethod()->getName())
        );
    }
}
