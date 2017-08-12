<?php

declare(strict_types=1);

namespace NullDev\Nemesis;

interface SourceParser
{
    public function parse(string $code): array;
}
