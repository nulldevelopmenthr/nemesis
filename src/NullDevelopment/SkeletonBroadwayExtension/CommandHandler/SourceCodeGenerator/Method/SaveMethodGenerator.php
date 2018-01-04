<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\Method;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\Method\SaveMethod;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\BaseMethodGenerator;

/**
 * @see SaveMethodGeneratorSpec
 * @see SaveMethodGeneratorTest
 */
class SaveMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SaveMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody('$this->repository->save($model);');
    }

    public function getMethodGeneratorPriority(): int
    {
        return 21;
    }
}
