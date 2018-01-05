<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadProjector;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;

/**
 * @see DoctrineReadProjectorGeneratorSpec
 * @see DoctrineReadProjectorGeneratorTest
 */
class DoctrineReadProjectorGenerator extends BaseSourceCodeDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof DoctrineReadProjector) {
            return true;
        }

        return false;
    }

    public function handleDoctrineReadProjector(DoctrineReadProjector $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
