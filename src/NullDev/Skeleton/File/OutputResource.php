<?php

declare(strict_types=1);

namespace NullDev\Skeleton\File;

use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see OutputResourceSpec
 * @see OutputResourceTest
 */
class OutputResource
{
    /** @var string */
    private $fileName;

    /** @var ImprovedClassSource */
    private $classSource;

    /** @var string */
    private $output;

    public function __construct(string $fileName, ImprovedClassSource $classSource, string $output)
    {
        $this->fileName    = $fileName;
        $this->classSource = $classSource;
        $this->output      = $output;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getClassSource(): ImprovedClassSource
    {
        return $this->classSource;
    }

    public function getOutput(): string
    {
        return $this->output;
    }
}
