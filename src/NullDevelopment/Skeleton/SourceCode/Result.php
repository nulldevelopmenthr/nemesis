<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\ClassType;

class Result
{
    /** @var ClassType */
    private $classType;
    /** @var PhpNamespace */
    private $generated;

    public function __construct(ClassType $classType, PhpNamespace $generated)
    {
        $this->classType = $classType;
        $this->generated = $generated;
    }

    public function getClassType(): ClassType
    {
        return $this->classType;
    }

    public function getGenerated(): PhpNamespace
    {
        return $this->generated;
    }
}
