<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\Method;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\Method\LoadMethod;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\BaseMethodGenerator;

/**
 * @see LoadMethodGeneratorSpec
 * @see LoadMethodGeneratorTest
 */
class LoadMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof LoadMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody('return $this->repository->load($id);');
    }

    public function getMethodGeneratorPriority(): int
    {
        return 20;
    }
}
