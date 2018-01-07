<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\ExampleMaker\TestData;

class ExampleWithSingleStaticTypeConstructorParameter
{
    /** @var string */
    private $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }
}
