<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Type;

use NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use Webmozart\Assert\Assert;

/**
 * @see ClassTypeSpec
 * @see ClassTypeTest
 */
class ClassType
{
    /** @var ClassName */
    private $name;
    /** @var null|ClassName */
    private $parent;
    /** @var InterfaceName[] */
    private $interfaces;
    /** @var TraitName[] */
    private $traits;
    /** @var null|ConstructorMethod */
    private $constructorMethod;
    /** @var Property[] */
    private $properties;

    public function __construct(
        ClassName $name,
        ?ClassName $parent,
        array $interfaces,
        array $traits,
        ?ConstructorMethod $constructorMethod,
        array $properties
    ) {
        Assert::allIsInstanceOf($interfaces, InterfaceName::class);
        Assert::allIsInstanceOf($traits, TraitName::class);
        Assert::allIsInstanceOf($properties, Property::class);

        $this->name              = $name;
        $this->parent            = $parent;
        $this->interfaces        = $interfaces;
        $this->traits            = $traits;
        $this->constructorMethod = $constructorMethod;
        $this->properties        = $properties;
    }

    public function getName(): ClassName
    {
        return $this->name;
    }

    public function getClassName(): string
    {
        return $this->name->getName();
    }

    public function getNamespace(): ?string
    {
        return $this->name->getNamespace();
    }

    public function getFullClassName(): string
    {
        return $this->name->getFullName();
    }

    public function hasParent(): bool
    {
        if (null === $this->parent) {
            return false;
        }

        return true;
    }

    public function getParent(): ?ClassName
    {
        return $this->parent;
    }

    public function getParentClassName(): string
    {
        if (null === $this->parent) {
            return '';
        }

        return $this->parent->getName();
    }

    public function getParentFullClassName(): string
    {
        if (null === $this->parent) {
            return '';
        }

        return $this->parent->getFullName();
    }

    public function hasInterfaces(): bool
    {
        if (true === empty($this->interfaces)) {
            return false;
        }

        return true;
    }

    /** @return InterfaceName[] */
    public function getInterfaces(): array
    {
        return $this->interfaces;
    }

    public function hasTraits(): bool
    {
        if (true === empty($this->traits)) {
            return false;
        }

        return true;
    }

    public function getTraits(): array
    {
        return $this->traits;
    }

    public function hasConstructorMethod(): bool
    {
        if (null === $this->constructorMethod) {
            return false;
        }

        return true;
    }

    public function getConstructorMethod(): ?ConstructorMethod
    {
        return $this->constructorMethod;
    }

    /** @return MethodParameter[] */
    public function getConstructorParameters(): array
    {
        if (null === $this->constructorMethod) {
            return [];
        }

        return $this->constructorMethod->getParameters();
    }

    public function hasProperties(): bool
    {
        if (true === empty($this->properties)) {
            return false;
        }

        return true;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function toArray(): array
    {
        if (null === $this->parent) {
            $parent = null;
        } else {
            $parent = $this->parent->getFullName();
        }

        $interfaces = [];
        $traits     = [];

        foreach ($this->interfaces as $interface) {
            $interfaces[] = $interface->getFullName();
        }

        foreach ($this->traits as $trait) {
            $traits[] = $trait->getFullName();
        }

        $items = [
            'type'        => $this->getCurrentType(),
            'instanceOf'  => $this->getFullClassName(),
            'parent'      => $parent,
            'interfaces'  => $interfaces,
            'traits'      => $traits,
            'constructor' => null,
        ];

        foreach ($this->getConstructorParameters() as $constructorParameter) {
            $items['constructor'][$constructorParameter->getName()] = [
                'instanceOf' => $constructorParameter->getInstanceFullName(),
                'nullable'   => $constructorParameter->isNullable(),
                'hasDefault' => $constructorParameter->hasDefaultValue(),
                'default'    => $constructorParameter->getDefaultValue(),
            ];
        }

        return ['definition' => $items];
    }

    private function getCurrentType()
    {
        $fullClassName = get_class($this);
        $exploded      = explode('\\', $fullClassName);

        return array_pop($exploded);
    }
}
