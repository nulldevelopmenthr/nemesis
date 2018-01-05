<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadProjector;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGenerator;

/**
 * @see TestDoctrineReadProjectorGeneratorSpec
 * @see TestDoctrineReadProjectorGeneratorTest
 */
class TestDoctrineReadProjectorGenerator extends BaseTestDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestDoctrineReadProjector) {
            return true;
        }

        return false;
    }
}
