<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\ExampleMaker\TestData;

class ExampleCollection
{
    /** @var array|GenericClass[] */
    private $items;

    /**
     * @param GenericClass[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }
}
