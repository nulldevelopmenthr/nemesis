<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHPUnit;

use NullDev\Skeleton\Definition\PHP\DocComment;

class CoversComment extends DocComment
{
    /** @var string */
    private $className;

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function __toString()
    {
        return '* @covers \\'.$this->className;
    }
}
