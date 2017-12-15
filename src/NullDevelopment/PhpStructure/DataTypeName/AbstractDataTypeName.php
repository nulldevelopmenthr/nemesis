<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataTypeName;

abstract class AbstractDataTypeName
{
    public const NAMESPACE_SEPARATOR = '\\';

    /** @var string */
    private $name;
    /** @var null|string */
    private $namespace;

    public function __construct(string $name, ?string $namespace = null)
    {
        $this->name      = $name;
        $this->namespace = $namespace;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    public function getFullName(): string
    {
        if (null === $this->namespace || '' === $this->namespace) {
            return $this->name;
        }

        return $this->namespace.'\\'.$this->name;
    }

    public static function createFromFullyQualified(string $fullName): self
    {
        $parts = explode(self::NAMESPACE_SEPARATOR, $fullName);
        $name  = array_pop($parts);

        $namespace = null;

        if (count($parts) > 0) {
            $namespace = implode(self::NAMESPACE_SEPARATOR, $parts);
        }

        return new static($name, $namespace);
    }
}
