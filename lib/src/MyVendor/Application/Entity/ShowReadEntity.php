<?php

declare(strict_types=1);

namespace MyVendor\Application\Entity;

use DateTime;
use MyVendor\Theater\Core\ShowId;

/**
 * @see \spec\MyVendor\Application\Entity\ShowReadEntitySpec
 * @see \Tests\MyVendor\Application\Entity\ShowReadEntityTest
 */
class ShowReadEntity
{
    /** @var ShowId */
    private $id;

    /** @var string */
    private $title;

    /** @var string|null */
    private $description;

    /** @var DateTime */
    private $createdAt;

    /** @var DateTime */
    private $updatedAt;

    public function __construct(ShowId $id, string $title, ?string $description, DateTime $createdAt, DateTime $updatedAt)
    {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
        $this->createdAt   = $createdAt;
        $this->updatedAt   = $updatedAt;
    }

    public function setId(ShowId $id)
    {
        $this->id = $id;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setDescription(?string $description)
    {
        $this->description = $description;
    }

    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getId(): ShowId
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function hasDescription(): bool
    {
        if (null === $this->description) {
            return false;
        }

        return true;
    }

    public function serialize(): array
    {
        return [
            'id'          => $this->id->serialize(),
            'title'       => $this->title,
            'description' => $this->description,
            'createdAt'   => $this->createdAt->format('c'),
            'updatedAt'   => $this->updatedAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            ShowId::deserialize($data['id']),
            $data['title'],
            $data['description'],
            new DateTime($data['createdAt']),
            new DateTime($data['updatedAt'])
        );
    }
}
