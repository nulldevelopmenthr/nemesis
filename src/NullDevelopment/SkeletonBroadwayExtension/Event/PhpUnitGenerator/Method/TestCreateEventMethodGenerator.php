<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\Method;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method\TestCreateEventMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\BaseTestMethodGenerator;

/**
 * @see TestCreateEventMethodGeneratorSpec
 * @see TestCreateEventMethodGeneratorTest
 */
class TestCreateEventMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestCreateEventMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $values = [];

        foreach ($method->getParameters() as $parameter) {
            $values[] = '$'.$parameter->getName();
        }

        $code
            ->addBody(sprintf('$result = $this->sut->create(%s);', implode(', ', $values)))
            ->addBody(sprintf('self::assertInstanceOf(%s::class, $result);', $method->getClassName()->getName()));
    }

    public function getMethodGeneratorPriority(): int
    {
        return 20;
    }
}
