<?php

declare(strict_types=1);

namespace MyVendor\Product;

/**
 * @see \spec\MyVendor\Product\ProductWeightSpec
 * @see \Tests\MyVendor\Product\ProductWeightTest
 */
class ProductWeight
{
    /** @var int */
    private $weight;

    public function __construct(int $weight)
    {
        $this->weight = $weight;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getValue(): int
    {
        return $this->weight;
    }

    public function __toString(): string
    {
        return (string) $this->weight;
    }

    public function serialize(): int
    {
        return $this->weight;
    }

    public static function deserialize(int $weight): self
    {
        return new self($weight);
    }
}
