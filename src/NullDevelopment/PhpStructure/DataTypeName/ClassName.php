<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataTypeName;

/**
 * @see ClassNameSpec
 * @see ClassNameTest
 */
class ClassName extends AbstractDataTypeName implements ContractName, Importable
{
    public static function create(string $fullName, ?string $alias = null): self
    {
        $parts = explode(self::NAMESPACE_SEPARATOR, $fullName);
        $name  = array_pop($parts);

        $namespace = null;

        if (count($parts) > 0) {
            $namespace = implode(self::NAMESPACE_SEPARATOR, $parts);
        }

        return new static($name, $namespace, $alias);
    }
}
