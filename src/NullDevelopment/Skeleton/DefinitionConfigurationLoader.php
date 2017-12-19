<?php

namespace NullDevelopment\Skeleton;

interface DefinitionConfigurationLoader extends ConfigurationLoader
{
    public function supports(array $input): bool;
}
