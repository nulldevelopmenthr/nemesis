<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\Method;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Method\CreateEventMethod;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\BaseMethodGenerator;

/**
 * @see CreateEventMethodGeneratorSpec
 * @see CreateEventMethodGeneratorTest
 */
class CreateEventMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof CreateEventMethod) {
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

        if (true === $method->isLastPropertyTimeStamp()) {
            $values[] = 'Carbon::now()';
        }

        $code->addBody(sprintf('return new self(%s);', implode(', ', $values)));
    }

    public function getMethodGeneratorPriority(): int
    {
        return 20;
    }
}
