<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadEntity;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;

/**
 * @see DoctrineReadEntityGeneratorSpec
 * @see DoctrineReadEntityGeneratorTest
 */
class DoctrineReadEntityGenerator extends BaseSourceCodeDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof DoctrineReadEntity) {
            return true;
        }

        return false;
    }

    public function handle(DoctrineReadEntity $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
