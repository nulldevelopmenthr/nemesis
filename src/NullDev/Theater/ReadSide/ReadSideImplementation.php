<?php

declare(strict_types=1);

namespace NullDev\Theater\ReadSide;

use Webmozart\Assert\Assert;

/**
 * @see ReadSideImplementationSpec
 * @see ReadSideImplementationTest
 */
class ReadSideImplementation
{
    const DOCTRINE_ORM = 'DoctrineORM';

    const ELASTICSEARCH = 'Elasticsearch';

    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        Assert::oneOf(
            $value, [self::DOCTRINE_ORM, self::ELASTICSEARCH], 'Only DoctrineORM and Elasticsearch are supported'
        );
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
