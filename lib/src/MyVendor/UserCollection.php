<?php

declare(strict_types=1);

namespace MyVendor;

use MyVendor\User\UserId;
use Webmozart\Assert\Assert;

/**
 * @see \spec\MyVendor\UserCollectionSpec
 * @see \Tests\MyVendor\UserCollectionTest
 */
class UserCollection
{
    /** @var array|UserEntity[] */
    private $elements;

    /**
     * @param UserEntity[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, UserEntity::class);
        $this->elements = $elements;
    }

    public function add(UserEntity $element)
    {
        $this->elements[] = $element;
    }

    public function has(UserId $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getId() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(UserId $id)
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

    public function serialize(): array
    {
        $data = [];
        foreach ($this->elements as $element) {
            $data[] = $element->serialize();
        }

        return $data;
    }

    public static function deserialize(array $data): self
    {
        $elements = [];
        foreach ($data as $item) {
            $elements[] = UserEntity::deserialize($item);
        }

        return new self($elements);
    }
}
