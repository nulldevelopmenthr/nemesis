<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeSerializeMethod;

/**
 * @see DateTimeSerializeMethodGeneratorSpec
 * @see DateTimeSerializeMethodGeneratorTest
 */
class DateTimeSerializeMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof DateTimeSerializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            'return $this->__toString();'
        );
    }

    public function getMethodGeneratorPriority(): int
    {
        return 95;
    }
}
