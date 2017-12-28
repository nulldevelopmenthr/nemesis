<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\PhpUnit\Method\TestToStringMethod;

/**
 * @see TestToStringMethodGeneratorSpec
 * @see TestToStringMethodGeneratorTest
 */
class TestToStringMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestToStringMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $property=$method->getProperty();

        if (true === in_array($property->getInstanceFullName(), ['int', 'float'])) {
            $body = sprintf('self::assertSame((string) $this->%s, $this->sut->__toString());', $property->getName());
        } elseif (true === in_array($property->getInstanceFullName(), ['bool'])) {
            $body = 'self::assertSame(\'true\', $this->sut->__toString());';
        } else {
            $body = sprintf('self::assertSame($this->%s, $this->sut->__toString());', $property->getName());
        }

        $code->addBody($body);
    }
}
