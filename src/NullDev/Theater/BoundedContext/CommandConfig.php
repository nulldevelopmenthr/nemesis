<?php

declare(strict_types=1);

namespace NullDev\Theater\BoundedContext;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Theater\Naming\CommandClassName;
use Webmozart\Assert\Assert;

/**
 * @see CommandConfigSpec
 * @see CommandConfigTest
 */
class CommandConfig
{
    /** @var string */
    private $name;

    /** @var CommandClassName */
    private $commandClassName;

    /** @var array */
    private $parameters;

    public function __construct(string $name, CommandClassName $commandClassName, array $parameters)
    {
        Assert::allIsInstanceOf($parameters, Parameter::class);

        $this->name             = $name;
        $this->commandClassName = $commandClassName;
        $this->parameters       = $parameters;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCommandClassName(): CommandClassName
    {
        return $this->commandClassName;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
