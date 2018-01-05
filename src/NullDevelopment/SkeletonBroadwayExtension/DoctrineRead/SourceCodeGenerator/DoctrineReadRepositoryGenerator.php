<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadRepository;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;

/**
 * @see DoctrineReadRepositoryGeneratorSpec
 * @see DoctrineReadRepositoryGeneratorTest
 */
class DoctrineReadRepositoryGenerator extends BaseSourceCodeDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof DoctrineReadRepository) {
            return true;
        }

        return false;
    }

    public function handleDoctrineReadRepository(DoctrineReadRepository $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
