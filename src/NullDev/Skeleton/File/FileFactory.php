<?php

declare(strict_types=1);

namespace NullDev\Skeleton\File;

use Exception;
use NullDev\Nemesis\Config\Config;
use NullDevelopment\PhpStructure\DataTypeName\AbstractDataTypeName;

class FileFactory
{
    /** @var Config */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    protected function getPathItBelongsTo2(AbstractDataTypeName $className)
    {
        foreach ($this->config->getPaths() as $path) {
            if ($path->belongsTo($className->getFullName())) {
                return $path;
            }
        }

        throw new Exception(
            'Err 235235235235235: Cant find path that "'.$className->getFullName().'" would belong to!'
        );
    }

    public function getPath2(AbstractDataTypeName $className)
    {
        return $this->getPathItBelongsTo2($className)->getFileNameFor($className->getFullName());
    }
}
