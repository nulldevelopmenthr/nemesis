<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpUnitExtension\Method\BaseTestMethod;

/**
 * @see TestCreateEventMethodSpec
 * @see TestCreateEventMethodTest
 */
class TestCreateEventMethod extends BaseTestMethod
{
    /** @var ClassName */
    private $className;

    /** @var array|Property[] */
    private $properties;

    /** @param Property[] $properties */
    public function __construct(ClassName $className, array $properties)
    {
        $this->className  = $className;
        $this->properties = $properties;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getName(): string
    {
        return 'testCreate';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return $this->properties;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [];
    }
}
