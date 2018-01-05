<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadRepository;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;

/**
 * @see SpecDoctrineReadRepositoryGeneratorSpec
 * @see SpecDoctrineReadRepositoryGeneratorTest
 */
class SpecDoctrineReadRepositoryGenerator extends BaseSpecDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecDoctrineReadRepository) {
            return true;
        }

        return false;
    }
}
