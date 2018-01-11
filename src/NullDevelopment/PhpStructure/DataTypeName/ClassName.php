<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataTypeName;

/**
 * @see ClassNameSpec
 * @see ClassNameTest
 */
class ClassName extends AbstractDataTypeName implements ContractName, Importable
{
    public static function create(string $fullName, ?string $alias = null)
    {
        $parts = explode(self::NAMESPACE_SEPARATOR, $fullName);
        $name  = array_pop($parts);

        $namespace = null;

        if (count($parts) > 0) {
            $namespace = implode(self::NAMESPACE_SEPARATOR, $parts);
        }

        return new static($name, $namespace, $alias);
    }

    public function isObject(): bool
    {
        if (true === in_array($this->getFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
            return false;
        }

        return true;
    }

    public function isArray(): bool
    {
        if (true === in_array($this->getFullName(), ['array'])) {
            return true;
        }

        return false;
    }
}
