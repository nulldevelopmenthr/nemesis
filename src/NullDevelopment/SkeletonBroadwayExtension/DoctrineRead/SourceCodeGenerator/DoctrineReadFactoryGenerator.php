<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCodeGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;

/**
 * @see DoctrineReadFactoryGeneratorSpec
 * @see DoctrineReadFactoryGeneratorTest
 */
class DoctrineReadFactoryGenerator extends BaseSourceCodeDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof DoctrineReadFactory) {
            return true;
        }

        return false;
    }

    public function handleDoctrineReadFactory(DoctrineReadFactory $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
