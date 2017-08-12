<?php

declare(strict_types=1);

namespace Miro\First;

/**
 * @see AhaValueObjectSpec
 * @see AhaValueObjectTest
 */
class AhaValueObject
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $value;

    public function __construct(string $name, int $value)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
