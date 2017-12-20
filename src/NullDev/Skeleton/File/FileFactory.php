<?php

declare(strict_types=1);

namespace NullDev\Skeleton\File;

use Exception;
use NullDev\Nemesis\Config\Config;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

class FileFactory
{
    /** @var Config */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function create(ImprovedClassSource $classSource): FileResource
    {
        return new FileResource($this->getPath($classSource), $classSource);
    }

    protected function getPathItBelongsTo(ImprovedClassSource $classSource)
    {
        foreach ($this->config->getPaths() as $path) {
            if ($path->belongsTo($classSource->getFullName())) {
                return $path;
            }
        }

        throw new Exception('Err 912123132: Cant find path that "'.$classSource->getFullName().'" would belong to!');
    }

    public function getPath(ImprovedClassSource $classSource)
    {
        return $this->getPathItBelongsTo($classSource)->getFileNameFor($classSource->getFullName());
    }

    public function createOutputResource(ImprovedClassSource $classSource, string $output): OutputResource
    {
        return new OutputResource($this->getPath($classSource), $classSource, $output);
    }

    protected function getPathItBelongsTo2(ClassName $className)
    {
        foreach ($this->config->getPaths() as $path) {
            if ($path->belongsTo($className->getFullName())) {
                return $path;
            }
        }

        throw new Exception('Err 235235235235235: Cant find path that "'.$className->getFullName().'" would belong to!');
    }

    public function getPath2(ClassName $className)
    {
        return $this->getPathItBelongsTo2($className)->getFileNameFor($className->getFullName());
    }
}
