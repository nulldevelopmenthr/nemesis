<?php

declare(strict_types=1);

namespace NullDev\Theater\ReadSide;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see ReadSideConfigFactorySpec
 * @see ReadSideConfigFactoryTest
 */
class ReadSideConfigFactory
{
    public function create(
        ReadSideName $name,
        ReadSideNamespace $namespace,
        ReadSideImplementation $implementation
    ): ReadSideConfig {
        $base = $namespace->getValue().'\\'.$name->getValue();

        return new ReadSideConfig(
            $name,
            $namespace,
            $implementation,
            ClassType::createFromFullyQualified($base.'Entity'),
            ClassType::createFromFullyQualified($base.'Repository'),
            ClassType::createFromFullyQualified($base.'Projector'),
            ClassType::createFromFullyQualified($base.'Factory')
        );
    }

    public function createFromArray(string $name, array $data): ReadSideConfig
    {
        $factory = null;

        if (true === array_key_exists('factory', $data['classes']) && null !== $data['classes']['factory']) {
            $factory = ClassType::createFromFullyQualified($data['classes']['factory']);
        }

        $config = new ReadSideConfig(
            new ReadSideName($name),
            new ReadSideNamespace($data['namespace']),
            new ReadSideImplementation($data['implementation']),
            ClassType::createFromFullyQualified($data['classes']['entity']),
            ClassType::createFromFullyQualified($data['classes']['repository']),
            ClassType::createFromFullyQualified($data['classes']['projector']),
            $factory
        );

        return $config;
    }
}
