<?php

declare(strict_types=1);

namespace MyCompany\ValueObject;

/**
 * Represents value object class with integer as constructor argument.
 */
class ShoeSize
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
