<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\SourceCode\Method\SetterMethod;

/**
 * @see SetterMethodGeneratorSpec
 * @see SetterMethodGeneratorTest
 */
class SetterMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SetterMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(sprintf('$this->%s = $%s;', $method->getPropertyName(), $method->getPropertyName()));
    }
}
