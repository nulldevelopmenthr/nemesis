<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\UuidV4CreateMethod;

/**
 * @see UuidV4CreateMethodGeneratorSpec
 * @see UuidV4CreateMethodGeneratorTest
 */
class UuidV4CreateMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof UuidV4CreateMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code
            ->addBody('$id = Uuid::uuid4()->toString();')
            ->addBody('')
            ->addBody('return new self($id);');
    }
}
