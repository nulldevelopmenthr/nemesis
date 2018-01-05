<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;

/**
 * @see TestDoctrineReadFactoryGeneratorSpec
 * @see TestDoctrineReadFactoryGeneratorTest
 */
class TestDoctrineReadFactoryGenerator extends BaseTestDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestDoctrineReadFactory) {
            return true;
        }

        return false;
    }
}
