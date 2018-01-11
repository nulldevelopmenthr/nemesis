<?php

declare(strict_types=1);

namespace NullDev\Theater\ReadSide;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see ReadSideConfigFactorySpec
 * @see ReadSideConfigFactoryTest
 */
class ReadSideConfigFactory
{
    public function create(
        ReadSideName $name, ReadSideNamespace $namespace, ReadSideImplementation $implementation, array $properties
    ): ReadSideConfig {
        return new ReadSideConfig(
            $name,
            $namespace,
            $implementation,
            ClassName::create($namespace->getValue().'\\Entity\\'.$name->getValue().'Entity'),
            ClassName::create($namespace->getValue().'\\Repository\\'.$name->getValue().'Repository'),
            ClassName::create($namespace->getValue().'\\Projector\\'.$name->getValue().'Projector'),
            ClassName::create($namespace->getValue().'\\Factory\\'.$name->getValue().'Factory'),
            $properties
        );
    }

    public function createFromArray(string $name, array $data): ReadSideConfig
    {
        $factory = null;

        if (true === array_key_exists('factory', $data['classes']) && null !== $data['classes']['factory']) {
            $factory = ClassName::create($data['classes']['factory']);
        }

        $properties = [];
        foreach ($data['properties'] as $propertyName => $propertyType) {
            $properties[] = Property::private($propertyName, ClassName::create($propertyType));
        }

        $config = new ReadSideConfig(
            new ReadSideName($name),
            new ReadSideNamespace($data['namespace']),
            new ReadSideImplementation($data['implementation']),
            ClassName::create($data['classes']['entity']),
            ClassName::create($data['classes']['repository']),
            ClassName::create($data['classes']['projector']),
            $factory,
            $properties
        );

        return $config;
    }
}
