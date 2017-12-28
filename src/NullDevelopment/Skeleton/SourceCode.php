<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton;

interface SourceCode
{
    public function getGenerationPriority(): int;
}
