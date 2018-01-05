<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadProjector;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;

/**
 * @see SpecDoctrineReadProjectorGeneratorSpec
 * @see SpecDoctrineReadProjectorGeneratorTest
 */
class SpecDoctrineReadProjectorGenerator extends BaseSpecDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecDoctrineReadProjector) {
            return true;
        }

        return false;
    }
}
