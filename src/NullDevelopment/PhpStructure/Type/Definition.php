<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Type;

interface Definition
{
    public function getName();

    public function getClassName(): string;

    public function getNamespace(): ?string;

    public function getFullClassName();

    public function hasParent(): bool;

    public function getParentClassName();

    public function getParentFullClassName();

    public function hasTraits(): bool;

    public function getTraits(): array;

    public function getInterfaces(): array;

    public function getProperties(): array;

    public function getMethods(): array;
}
