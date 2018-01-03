<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Type;

use NullDevelopment\PhpStructure\Behaviour\ConstructorMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use Webmozart\Assert\Assert;

/**
 * @see ClassDefinitionSpec
 * @see ClassDefinitionTest
 * @SuppressWarnings("PHPMD.NumberOfChildren")
 */
class ClassDefinition implements Definition
{
    /** @var ClassName */
    private $name;

    /** @var null|ClassName */
    private $parent;

    /** @var InterfaceName[] */
    private $interfaces;

    /** @var TraitName[] */
    private $traits;

    /** @var Constant[] */
    private $constants;

    /** @var Property[] */
    private $properties;

    /** @var Method[] */
    private $methods;

    public function __construct(
        ClassName $name,
        ?ClassName $parent,
        array $interfaces,
        array $traits,
        array $constants,
        array $properties,
        array $methods
    ) {
        Assert::allIsInstanceOf($interfaces, InterfaceName::class);
        Assert::allIsInstanceOf($traits, TraitName::class);
        Assert::allIsInstanceOf($constants, Constant::class);
        Assert::allIsInstanceOf($properties, Property::class);
        Assert::allIsInstanceOf($methods, Method::class);

        $this->name       = $name;
        $this->parent     = $parent;
        $this->interfaces = $interfaces;
        $this->traits     = $traits;
        $this->constants  = $constants;
        $this->properties = $properties;
        $this->methods    = $methods;
    }

    public function getInstanceOf(): ClassName
    {
        return $this->name;
    }

    /**
     * @deprecated Use getInstanceOf()
     */
    public function getName(): ClassName
    {
        return $this->name;
    }

    public function getInstanceOfName(): string
    {
        return $this->name->getName();
    }

    /**
     * @deprecated Use getInstanceOfName()
     */
    public function getClassName(): string
    {
        return $this->name->getName();
    }

    public function getNamespace(): ?string
    {
        return $this->name->getNamespace();
    }

    public function getInstanceOfFullName(): string
    {
        return $this->name->getFullName();
    }

    /**
     * @deprecated Use getInstanceOfFullName()
     */
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

    public function getParentAlias(): ?string
    {
        if (null === $this->parent) {
            return null;
        }

        return $this->parent->getAlias();
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

    public function hasConstants(): bool
    {
        if (true === empty($this->constants)) {
            return false;
        }

        return true;
    }

    public function getConstants(): array
    {
        return $this->constants;
    }

    public function hasConstructorMethod(): bool
    {
        foreach ($this->methods as $method) {
            if ($method instanceof ConstructorMethod) {
                return true;
            }
        }

        return false;
    }

    public function getConstructorMethod(): ?ConstructorMethod
    {
        foreach ($this->methods as $method) {
            if ($method instanceof ConstructorMethod) {
                return $method;
            }
        }

        return null;
    }

    /** @return MethodParameter[] */
    public function getConstructorParameters(): array
    {
        foreach ($this->methods as $method) {
            if ($method instanceof ConstructorMethod) {
                return $method->getParameters();
            }
        }

        return [];
    }

    public function hasProperties(): bool
    {
        if (true === empty($this->properties)) {
            return false;
        }

        return true;
    }

    /** @return Property[] */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function hasMethods(): bool
    {
        if (true === empty($this->methods)) {
            return false;
        }

        return true;
    }

    /** @return Method[] */
    public function getMethods(): array
    {
        return $this->methods;
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

    public function getGenerationPriority(): int
    {
        return 30;
    }
}
