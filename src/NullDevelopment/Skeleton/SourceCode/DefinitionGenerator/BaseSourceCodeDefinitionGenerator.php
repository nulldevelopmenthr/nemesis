<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator\BaseClassDefinitionGenerator;

abstract class BaseSourceCodeDefinitionGenerator extends BaseClassDefinitionGenerator
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
                '@see \\spec\\'.$definition->getFullClassName().'Spec'
            );
            $classCode->addComment(
                '@see \\Tests\\'.$definition->getFullClassName().'Test'
            );
        }

        return $namespace;
    }
}
