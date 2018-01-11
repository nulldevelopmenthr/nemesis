<?php

declare(strict_types=1);

namespace NullDev\Theater\BoundedContext;

use NullDev\Theater\Naming\EventClassName;
use NullDevelopment\PhpStructure\DataType\Property;
use Webmozart\Assert\Assert;

/**
 * @see EventConfigSpec
 * @see EventConfigTest
 */
class EventConfig
{
    /** @var string */
    private $name;

    /** @var EventClassName */
    private $eventClassName;

    /** @var array */
    private $parameters;

    public function __construct(string $name, EventClassName $eventClassName, array $parameters)
    {
        Assert::allIsInstanceOf($parameters, Property::class);

        $this->name           = $name;
        $this->eventClassName = $eventClassName;
        $this->parameters     = $parameters;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEventClassName(): EventClassName
    {
        return $this->eventClassName;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
