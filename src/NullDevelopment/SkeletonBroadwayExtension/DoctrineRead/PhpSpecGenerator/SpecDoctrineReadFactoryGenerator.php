<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;

/**
 * @see SpecDoctrineReadFactoryGeneratorSpec
 * @see SpecDoctrineReadFactoryGeneratorTest
 */
class SpecDoctrineReadFactoryGenerator extends BaseSpecDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecDoctrineReadFactory) {
            return true;
        }

        return false;
    }
}
