<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\Definition;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpecSpecification;

abstract class BaseSpecClassDefinition extends ClassType implements PhpSpecSpecification
{
    /** @var ClassName */
    private $subjectUnderTest;

    public function __construct(
        ClassName $name,
        ?ClassName $parent,
        array $interfaces,
        array $traits,
        array $properties,
        array $methods,
        ClassName $subjectUnderTest
    ) {
        parent::__construct($name, $parent, $interfaces, $traits, $properties, $methods);
        $this->subjectUnderTest = $subjectUnderTest;
    }

    public function getSubjectUnderTest(): ClassName
    {
        return $this->subjectUnderTest;
    }
}
