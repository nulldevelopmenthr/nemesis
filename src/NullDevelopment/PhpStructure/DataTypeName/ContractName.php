<?php

namespace NullDevelopment\PhpStructure\DataTypeName;

/**
 * Interface defining parameter contract expectations.
 */
interface ContractName
{
    public function getName(): string;

    public function getNamespace(): ?string;

    public function getFullName(): string;
}
