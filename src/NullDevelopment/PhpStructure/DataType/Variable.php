<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataType;

use NullDevelopment\PhpStructure\DataTypeName\ContractName;

interface Variable
{
    public function getName(): string;

    public function getInstanceName(): ContractName;

    public function getInstanceFullName(): string;
}
