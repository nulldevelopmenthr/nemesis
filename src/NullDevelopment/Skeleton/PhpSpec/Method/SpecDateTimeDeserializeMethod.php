<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see SpecDateTimeDeserializeMethodSpec
 * @see SpecDateTimeDeserializeMethodTest
 */
class SpecDateTimeDeserializeMethod extends BaseSpecMethod
{
    /** @var ClassName */
    private $className;

    public function __construct(ClassName $className)
    {
        $this->className = $className;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getName(): string
    {
        return 'it_is_deserializable';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getImports(): array
    {
        return [];
    }
}
