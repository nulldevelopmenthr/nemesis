<?php

declare(strict_types=1);

namespace NullDev\Theater\BoundedContext;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Theater\Naming\EventClassName;
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
        Assert::allIsInstanceOf($parameters, Parameter::class);

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
