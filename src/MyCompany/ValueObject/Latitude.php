<?php

declare(strict_types=1);

namespace MyCompany\ValueObject;

/**
 * Represents value object class with float as constructor argument.
 */
class Latitude
{
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
