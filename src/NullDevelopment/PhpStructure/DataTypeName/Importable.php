<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataTypeName;

/**
 * Interface defining that data type implementing it can be imported to a namespace.
 */
interface Importable
{
    public function getFullName(): string;
}
