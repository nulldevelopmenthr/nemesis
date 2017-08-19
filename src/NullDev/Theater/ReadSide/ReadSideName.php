<?php

declare(strict_types=1);

namespace NullDev\Theater\ReadSide;

use Webmozart\Assert\Assert;

/**
 * @see ReadSideNameSpec
 * @see ReadSideNameTest
 */
class ReadSideName
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        Assert::notEmpty($name, 'Name should not be empty.');

        Assert::alnum($name, 'Name can use only alphanumeric characters.');

        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
