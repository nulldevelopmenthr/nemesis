<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\ExampleMaker\TestData;

class ExampleWithStaticTypeConstructorParameters
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /** @var float */
    private $amount;

    /** @var bool */
    private $active;

    /** @var array */
    private $tags;

    public function __construct(int $id, string $title, float $amount, bool $active, array $tags)
    {
        $this->id     = $id;
        $this->title  = $title;
        $this->amount = $amount;
        $this->active = $active;
        $this->tags   = $tags;
    }
}
