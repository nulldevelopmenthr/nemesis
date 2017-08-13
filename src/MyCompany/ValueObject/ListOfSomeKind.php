<?php

declare(strict_types=1);

namespace MyCompany\ValueObject;

/**
 * Represents value object class with array as constructor argument.
 */
class ListOfSomeKind
{
    private $list;

    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public function getList(): array
    {
        return $this->list;
    }
}
