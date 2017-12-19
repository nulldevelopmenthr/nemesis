<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Behaviour;

interface Method
{
    public function getName(): string;

    public function getParameters(): array;

    public function getReturnType(): ?string;
}
