<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton;

use Webmozart\Assert\Assert;

class ObjectConfigurationLoaderCollection
{
    /** @var array */
    private $loaders;

    public function __construct(array $loaders = [])
    {
        Assert::allIsInstanceOf($loaders, DefinitionConfigurationLoader::class);
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
