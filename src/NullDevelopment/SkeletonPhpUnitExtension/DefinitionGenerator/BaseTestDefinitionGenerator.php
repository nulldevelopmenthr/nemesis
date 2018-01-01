<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator\BaseClassDefinitionGenerator;

abstract class BaseTestDefinitionGenerator extends BaseClassDefinitionGenerator
{
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function generate(Definition $definition): PhpNamespace
    {
        $namespace = parent::generate($definition);

        foreach ($namespace->getClasses() as $classCode) {
            $classCode->addComment(
                '@covers \\'.$definition->getSubjectUnderTest()->getFullName()
            );
            $classCode->addComment(
                '@group  todo'
            );
        }

        return $namespace;
    }
}
