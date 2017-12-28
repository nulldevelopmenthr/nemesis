<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeCreateFromFormatMethod;

/**
 * @see TestDateTimeCreateFromFormatMethodGeneratorSpec
 * @see TestDateTimeCreateFromFormatMethodGeneratorTest
 */
class TestDateTimeCreateFromFormatMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestDateTimeCreateFromFormatMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code
            ->addBody('$result = $this->sut::createFromFormat(DateTime::ATOM, \'2018-01-01T11:22:33Z\');')
            ->addBody('self::assertEquals(\'2018-01-01T11:22:33+00:00\', $result->__toString());');
    }
}
