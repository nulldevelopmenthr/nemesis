<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\Definition;

class Result
{
    /** @var Definition */
    private $classType;

    /** @var PhpNamespace */
    private $generated;

    public function __construct(Definition $classType, PhpNamespace $generated)
    {
        $this->classType = $classType;
        $this->generated = $generated;
    }

    public function getClassDefinition(): Definition
    {
        return $this->classType;
    }

    public function getGenerated(): PhpNamespace
    {
        return $this->generated;
    }
}
