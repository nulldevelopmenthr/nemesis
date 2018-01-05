<?php

declare(strict_types=1);

namespace MyVendor;

use MyVendor\Product\ProductId;
use Webmozart\Assert\Assert;

/**
 * @see \spec\MyVendor\ProductCollectionSpec
 * @see \Tests\MyVendor\ProductCollectionTest
 */
class ProductCollection
{
    const RANDOM_CONST = 530;

    /** @var array|ProductEntity[] */
    private $elements;

    /**
     * @param ProductEntity[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, ProductEntity::class);
        $this->elements = $elements;
    }

    public function add(ProductEntity $element)
    {
        $this->elements[] = $element;
    }

    public function has(ProductId $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getId() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(ProductId $id)
    {
        foreach ($this->elements as $element) {
            if ($element->getId() == $id) {
                return $element;
            }
        }

        return null;
    }

    public function toArray(): array
    {
        return $this->elements;
    }

    public function count(): int
    {
        return count($this->elements);
    }
}
