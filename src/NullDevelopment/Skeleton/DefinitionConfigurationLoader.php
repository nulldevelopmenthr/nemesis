<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton;

interface DefinitionConfigurationLoader extends ConfigurationLoader
{
    public function supports(array $input): bool;
}
