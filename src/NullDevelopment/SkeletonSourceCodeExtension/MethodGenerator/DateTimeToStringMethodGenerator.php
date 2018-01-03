<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeToStringMethod;

/**
 * @see DateTimeToStringMethodGeneratorSpec
 * @see DateTimeToStringMethodGeneratorTest
 */
class DateTimeToStringMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof DateTimeToStringMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            'return $this->format(\'c\');'
        );
    }
}
