<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core;

use NullDevelopment\Skeleton\SourceCode;
use Webmozart\Assert\Assert;

class DefinitionLoaderCollection
{
    /** @var array */
    private $loaders;

    public function __construct(array $loaders = [])
    {
        Assert::allIsInstanceOf($loaders, DefinitionLoader::class);
        $this->loaders = $loaders;
    }

    public function getLoaders(): array
    {
        return $this->loaders;
    }

    public function findAndLoad(array $config): SourceCode
    {
        foreach ($this->loaders as $loader) {
            if (true === $loader->supports($config)) {
                return $loader->load($config);
            }
        }
    }
}
