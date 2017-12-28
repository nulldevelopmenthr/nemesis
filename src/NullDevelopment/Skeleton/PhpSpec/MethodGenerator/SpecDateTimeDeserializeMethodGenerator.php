<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeDeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\BaseMethodGenerator;

/**
 * @see SpecDateTimeDeserializeMethodGeneratorSpec
 * @see SpecDateTimeDeserializeMethodGeneratorTest
 */
class SpecDateTimeDeserializeMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecDateTimeDeserializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            sprintf(
                '$this->deserialize(\'2018-01-01T11:22:33+00:00\')->shouldReturnAnInstanceOf(%s::class);',
                $method->getClassName()->getName()
            )
        );
    }
}
