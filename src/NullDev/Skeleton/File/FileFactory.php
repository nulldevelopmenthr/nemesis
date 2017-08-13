<?php

declare(strict_types=1);

namespace NullDev\Skeleton\File;

use NullDev\Nemesis\Config\Config;
use NullDev\Skeleton\Source\ImprovedClassSource;

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

        throw new \Exception('Err 912123132: Cant find path that "'.$classSource->getFullName().'" would belong to!');
    }

    public function getPath(ImprovedClassSource $classSource)
    {
        return $this->getPathItBelongsTo($classSource)->getFileNameFor($classSource->getFullName());
    }
}
