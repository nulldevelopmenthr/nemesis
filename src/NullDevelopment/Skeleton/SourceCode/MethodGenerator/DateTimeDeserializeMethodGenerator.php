<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;

/**
 * @see DateTimeDeserializeMethodGeneratorSpec
 * @see DateTimeDeserializeMethodGeneratorTest
 */
class DateTimeDeserializeMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof DateTimeDeserializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            'return new self($value);'
        );
    }
}
