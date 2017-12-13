<?php

declare(strict_types=1);

namespace MyCompany\Entity;

use DateTime;

/**
 * Represents class with getters and setters.
 */
class TransactionEntity
{
    /** @var string */
    private $id;
    /** @var int */
    private $amount;
    /** @var \DateTime */
    private $createdAt;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
