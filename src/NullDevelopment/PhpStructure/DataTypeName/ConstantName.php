<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataTypeName;

/**
 * @see ConstantNameSpec
 * @see ConstantNameTest
 */
class ConstantName
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
