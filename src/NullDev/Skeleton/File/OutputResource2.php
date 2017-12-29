<?php

declare(strict_types=1);

namespace NullDev\Skeleton\File;

use NullDevelopment\PhpStructure\DataTypeName\AbstractDataTypeName;

class OutputResource2
{
    /** @var string */
    private $fileName;
    /** @var AbstractDataTypeName */
    private $className;
    /** @var string */
    private $output;

    public function __construct(string $fileName, AbstractDataTypeName $className, string $output)
    {
        $this->fileName  = $fileName;
        $this->className = $className;
        $this->output    = $output;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getClassName(): AbstractDataTypeName
    {
        return $this->className;
    }

    public function getOutput(): string
    {
        return $this->output;
    }
}
