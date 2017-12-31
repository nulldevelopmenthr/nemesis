<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\BaseMethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeCreateFromFormatMethod;

/**
 * @see SpecDateTimeCreateFromFormatMethodGeneratorSpec
 * @see SpecDateTimeCreateFromFormatMethodGeneratorTest
 */
class SpecDateTimeCreateFromFormatMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecDateTimeCreateFromFormatMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody('$result = $this->createFromFormat(DateTime::ATOM, \'2018-01-01T11:22:33Z\');');
        $code->addBody('$result->__toString()->shouldReturn(\'2018-01-01T11:22:33+00:00\');');
    }
}
