<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataType;

use MyCLabs\Enum\Enum;

/**
 * @see VisibilitySpec
 * @see VisibilityTest
 */
class Visibility extends Enum
{
    const PRIVATE = 'private';

    const PROTECTED = 'protected';

    const PUBLIC = 'public';
}
