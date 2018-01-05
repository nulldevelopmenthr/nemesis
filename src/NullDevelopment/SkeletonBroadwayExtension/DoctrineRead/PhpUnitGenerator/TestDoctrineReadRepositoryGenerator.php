<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadRepository;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;

/**
 * @see TestDoctrineReadRepositoryGeneratorSpec
 * @see TestDoctrineReadRepositoryGeneratorTest
 */
class TestDoctrineReadRepositoryGenerator extends BaseTestDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestDoctrineReadRepository) {
            return true;
        }

        return false;
    }
}
