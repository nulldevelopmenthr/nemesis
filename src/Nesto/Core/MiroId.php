<?php

declare(strict_types=1);

namespace Nesto\Core;

use Ramsey\Uuid\Uuid;

class MiroId
{
    /** @var string */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public static function create(): MiroId
    {
        $id = Uuid::uuid4()->toString();

        return new self($id);
    }
}
