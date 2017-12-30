<?php

declare(strict_types=1);

namespace NullDev\Skeleton\File;

use NullDev\Skeleton\Source\ImprovedClassSource;

class FileResource
{
    /** @var string */
    private $fileName;

    /** @var ImprovedClassSource */
    private $classSource;

    public function __construct(string $fileName, ImprovedClassSource $classSource)
    {
        $this->fileName    = $fileName;
        $this->classSource = $classSource;
    }

    public function getClassSource(): ImprovedClassSource
    {
        return $this->classSource;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }
}
