<?php

declare(strict_types=1);

namespace NullDev\Theater\ReadSide;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see ReadSideConfigSpec
 * @see ReadSideConfigTest
 */
class ReadSideConfig
{
    /** @var ReadSideName */
    private $name;
    /** @var ReadSideNamespace */
    private $namespace;
    /** @var ReadSideImplementation */
    private $implementation;
    /** @var ClassType */
    private $readEntity;
    /** @var ClassType */
    private $readRepository;
    /** @var ClassType */
    private $readProjector;
    /** @var ClassType|null */
    private $readFactory;
    /** @var array */
    private $properties;

    public function __construct(
        ReadSideName $name,
        ReadSideNamespace $namespace,
        ReadSideImplementation $implementation,
        ClassType $readEntity,
        ClassType $readRepository,
        ClassType $readProjector,
        ?ClassType $readFactory,
        array $properties
    ) {
        $this->name           = $name;
        $this->namespace      = $namespace;
        $this->implementation = $implementation;
        $this->readEntity     = $readEntity;
        $this->readRepository = $readRepository;
        $this->readProjector  = $readProjector;
        $this->readFactory    = $readFactory;
        $this->properties     = $properties;
    }

    public function getName(): ReadSideName
    {
        return $this->name;
    }

    public function getNamespace(): ReadSideNamespace
    {
        return $this->namespace;
    }

    public function getImplementation(): ReadSideImplementation
    {
        return $this->implementation;
    }

    public function getReadEntity(): ClassType
    {
        return $this->readEntity;
    }

    public function getReadRepository(): ClassType
    {
        return $this->readRepository;
    }

    public function getReadProjector(): ClassType
    {
        return $this->readProjector;
    }

    public function getReadFactory(): ?ClassType
    {
        return $this->readFactory;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function toArray(): array
    {
        $properties = [];

        foreach ($this->properties as $property) {
            $properties[$property->getName()] = $property->getTypeFullName();
        }

        $data = [
            'namespace'      => $this->namespace->getValue(),
            'implementation' => $this->implementation->getValue(),
            'classes'        => [
                'entity'     => $this->readEntity->getFullName(),
                'repository' => $this->readRepository->getFullName(),
                'projector'  => $this->readProjector->getFullName(),
            ],
            'properties'     => $properties,
        ];

        if (null !== $this->readFactory) {
            $data['classes']['factory'] = $this->readFactory->getFullName();
        }

        return $data;
    }
}
