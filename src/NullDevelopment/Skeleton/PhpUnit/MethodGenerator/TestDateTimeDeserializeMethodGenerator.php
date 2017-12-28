<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeDeserializeMethod;

/**
 * @see TestDateTimeDeserializeMethodGeneratorSpec
 * @see TestDateTimeDeserializeMethodGeneratorTest
 */
class TestDateTimeDeserializeMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestDateTimeDeserializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            sprintf('self::assertEquals($this->sut, $this->sut->deserialize(\'2018-01-01T11:22:33+00:00\'));')
        );
    }
}
