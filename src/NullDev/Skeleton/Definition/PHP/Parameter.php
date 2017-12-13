<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP;

use Exception;
use NullDev\Skeleton\Definition\PHP\Types\Type;
use NullDev\Skeleton\Definition\PHP\Types\TypeFactory;

/**
 * @see ParameterSpec
 * @see ParameterTest
 */
class Parameter
{
    /** @var string */
    private $name;
    /** @var Type|null */
    private $type;

    public function __construct(string $name, Type $type = null)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public static function create(string $name, ?string $type = null): self
    {
        return new self($name, TypeFactory::create($type));
    }

    public static function createFromProperty(Property $property): self
    {
        return new self($property->getName(), $property->getType());
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getTypeFullName(): string
    {
        if (null === $this->type) {
            return '';
        }

        return $this->type->getFullName();
    }

    public function getTypeShortName(): string
    {
        if (null === $this->type) {
            throw new Exception();
        }

        return $this->type->getName();
    }

    public function hasType(): bool
    {
        if (null === $this->type) {
            return false;
        }

        return true;
    }
}
