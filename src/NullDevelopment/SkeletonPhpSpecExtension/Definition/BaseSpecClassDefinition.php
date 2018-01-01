<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\Definition;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecSpecification;

abstract class BaseSpecClassDefinition extends ClassDefinition implements PhpSpecSpecification
{
    /** @var ClassName */
    private $subjectUnderTest;

    public function __construct(
        ClassName $name,
        ?ClassName $parent,
        array $interfaces,
        array $traits,
        array $constants,
        array $properties,
        array $methods,
        ClassName $subjectUnderTest
    ) {
        parent::__construct($name, $parent, $interfaces, $traits, $constants, $properties, $methods);
        $this->subjectUnderTest = $subjectUnderTest;
    }

    public function getSubjectUnderTest(): ClassName
    {
        return $this->subjectUnderTest;
    }
}
