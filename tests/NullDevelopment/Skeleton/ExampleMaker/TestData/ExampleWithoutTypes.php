<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\ExampleMaker\TestData;

class ExampleWithoutTypes
{
    private $id;

    private $title;

    public function __construct($id, $title)
    {
        $this->id    = $id;
        $this->title = $title;
    }
}
