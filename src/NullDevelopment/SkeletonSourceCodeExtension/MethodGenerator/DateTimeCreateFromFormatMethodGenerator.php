<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DateTimeCreateFromFormatMethod;

/**
 * @see DateTimeCreateFromFormatMethodGeneratorSpec
 * @see DateTimeCreateFromFormatMethodGeneratorTest
 */
class DateTimeCreateFromFormatMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof DateTimeCreateFromFormatMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody('$date = parent::createFromFormat($format, $time, $object);');
        $code->addBody('return new self($date->format(\'c\'));');
    }
}
