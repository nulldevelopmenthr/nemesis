<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Source;

use NullDev\Skeleton\Definition\PHP\DocComment;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\Importable;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Definition\PHP\Types\Type;

/**
 * @see ImprovedClassSourceSpec
 * @see ImprovedClassSourceTest
 */
class ImprovedClassSource
{
    private $classType;
    private $docComments = [];
    private $parent;
    private $interfaces = [];
    private $traits     = [];
    private $constructor;

    private $properties = [];
    private $methods    = [];

    private $imports = [];

    public function __construct(ClassType $classType)
    {
        $this->classType = $classType;
    }

    public function getClassType(): ClassType
    {
        return $this->classType;
    }

    public function hasNamespace(): bool
    {
        return $this->classType->hasNamespace();
    }

    public function getNamespace(): string
    {
        return $this->classType->getNamespace();
    }

    public function getName(): string
    {
        return $this->classType->getName();
    }

    public function getFullName(): string
    {
        return $this->classType->getFullName();
    }

    //-----   DocComments   -----

    public function addDocComment(DocComment $comment)
    {
        $this->docComments[] = $comment;
    }

    public function getDocComments(): array
    {
        return $this->docComments;
    }

    //-----     Parent     -----

    public function addParent(ClassType $parent)
    {
        if ($this->hasParent()) {
            throw new \Exception('Err 1000100: Class already has parent!');
        }

        $this->parent = $parent;

        $this->addImportIfEligible($parent);

        return $this;
    }

    public function hasParent(): bool
    {
        if (null === $this->parent) {
            return false;
        }

        return true;
    }

    public function getParent(): ?ClassType
    {
        return $this->parent;
    }

    public function getParentName(): ?string
    {
        if (false === $this->hasParent()) {
            return null;
        }

        return $this->parent->getName();
    }

    public function getParentFullName(): ?string
    {
        if (false === $this->hasParent()) {
            return null;
        }

        return $this->parent->getFullName();
    }

    //-----     Interfaces     -----

    public function addInterface(InterfaceType $interface)
    {
        $this->interfaces[] = $interface;
        $this->addImportIfEligible($interface);

        return $this;
    }

    public function hasInterfaces(): bool
    {
        if (0 === count($this->interfaces)) {
            return false;
        }

        return true;
    }

    /** @return InterfaceType[]|array */
    public function getInterfaces(): array
    {
        return $this->interfaces;
    }

    //-----     Traits     -----

    public function addTrait(TraitType $trait)
    {
        $this->traits[] = $trait;
        $this->addImportIfEligible($trait);

        return $this;
    }

    public function hasTraits(): bool
    {
        if (0 === count($this->traits)) {
            return false;
        }

        return true;
    }

    /** @return TraitType[]|array */
    public function getTraits(): array
    {
        return $this->traits;
    }

    //-----     ConstructorMethod     -----

    public function hasConstructorMethod(): bool
    {
        if (null === $this->constructor) {
            return false;
        }

        return true;
    }

    public function addConstructorMethod(ConstructorMethod $constructor)
    {
        if ($this->hasConstructorMethod()) {
            throw new \Exception('Err 1000200: Class already has constructor!');
        }

        $this->constructor = $constructor;

        foreach ($constructor->getMethodParameters() as $parameter) {
            if (true === $parameter->hasType()) {
                $this->addImportIfEligible($parameter->getType());
            }
        }

        $this->addMethod($constructor);

        return $this;
    }

    public function getConstructorMethod(): ?ConstructorMethod
    {
        return $this->constructor;
    }

    /** @return Parameter[]|array */
    public function getConstructorParameters(): array
    {
        if (false === $this->hasConstructorMethod()) {
            return [];
        }

        return $this->constructor->getMethodParameters();
    }

    public function hasConstructorParameterNamed(string $parameterName): bool
    {
        if (null === $this->constructor) {
            return false;
        }

        return $this->constructor->hasParameterNamed($parameterName);
    }

    //-----     Properties     -----

    public function addProperty(Property $property)
    {
        if (false === $this->hasPropertyNamed($property->getName())) {
            $this->properties[] = $property;
        }
    }

    /** @return Property[]|array */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function hasPropertyNamed(string $propertyName): bool
    {
        foreach ($this->properties as $property) {
            if ($property->getName() === $propertyName) {
                return true;
            }
        }

        return false;
    }

    public function getPropertyNamed(string $propertyName): Property
    {
        foreach ($this->properties as $property) {
            if ($property->getName() === $propertyName) {
                return $property;
            }
        }

        throw new \LogicException('No property named '.$propertyName.'found');
    }

    //-----     Methods     -----

    public function addGetterMethod(Parameter $parameter)
    {
        $this->addMethod(GetterMethod::create($parameter));
    }

    public function addMethod(Method $method)
    {
        $this->methods[] = $method;
    }

    /** @return Method[]|array */
    public function getMethods(): array
    {
        return $this->methods;
    }

    //-----     Import     -----

    public function addImports(Type ...$imports)
    {
        foreach ($imports as $import) {
            $this->addImportIfEligible($import);
        }
    }

    public function addImport(Type $import)
    {
        $this->addImportIfEligible($import);
    }

    private function addImportIfEligible(Type $import)
    {
        if ($import instanceof Importable && false === in_array($import, $this->imports)) {
            $this->imports[] = $import;
        }
    }

    /** @return Type[]|array */
    public function getImports(): array
    {
        $sorter = function ($first, $second) {
            return $first->getFullName() <=> $second->getFullName();
        };
        usort($this->imports, $sorter);

        return $this->imports;
    }
}
