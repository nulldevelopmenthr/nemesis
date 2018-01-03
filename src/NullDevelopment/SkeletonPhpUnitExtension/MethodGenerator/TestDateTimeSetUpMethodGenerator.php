<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeSetUpMethod;

/**
 * @see TestDateTimeSetUpMethodGeneratorSpec
 * @see TestDateTimeSetUpMethodGeneratorTest
 */
class TestDateTimeSetUpMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestDateTimeSetUpMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            sprintf('$this->sut = new %s(%s);', $method->getClassName()->getName(), '\'2018-01-01T11:22:33+00:00\'')
        );
    }

    public function getMethodGeneratorPriority(): int
    {
        return 10;
    }
}
