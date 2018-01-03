<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestHasPropertyMethod;

/**
 * @see TestHasPropertyMethodGeneratorSpec
 * @see TestHasPropertyMethodGeneratorTest
 */
class TestHasPropertyMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestHasPropertyMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            sprintf('self::assertTrue($this->sut->%s());', $method->getMethodUnderTest())
        );
    }

    public function getMethodGeneratorPriority(): int
    {
        return 60;
    }
}
