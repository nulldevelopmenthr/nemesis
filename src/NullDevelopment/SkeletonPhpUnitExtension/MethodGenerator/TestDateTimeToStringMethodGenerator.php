<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeToStringMethod;

/**
 * @see TestDateTimeToStringMethodGeneratorSpec
 * @see TestDateTimeToStringMethodGeneratorTest
 */
class TestDateTimeToStringMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestDateTimeToStringMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            sprintf('self::assertSame(\'2018-01-01T11:22:33+00:00\', $this->sut->__toString());')
        );
    }
}
