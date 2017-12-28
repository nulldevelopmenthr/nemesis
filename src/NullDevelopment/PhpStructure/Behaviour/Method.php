<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Behaviour;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;

interface Method
{
    public function getVisibility(): Visibility;

    public function getName(): string;

    /** @return Property[] */
    public function getParameters(): array;

    //@TODO: Remove nullability
    public function getReturnType(): ?string;

    public function isNullableReturnType(): bool;

    public function getImports(): array;

    public function isStatic(): bool;
}
