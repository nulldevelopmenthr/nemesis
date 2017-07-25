<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP;

use NullDev\Skeleton\Definition\PHP\Types\Type;

/**
 * @see ParameterSpec
 * @see ParameterTest
 */
class Parameter
{
    /** @var string */
    private $name;
    /** @var Type */
    private $type;

    public function __construct(string $name, Type $type = null)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getTypeShortName(): ?string
    {
        if (null === $this->type) {
            return null;
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
