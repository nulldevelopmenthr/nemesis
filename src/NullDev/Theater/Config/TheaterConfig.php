<?php

declare(strict_types=1);

namespace NullDev\Theater\Config;

use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\ContextName;
use Webmozart\Assert\Assert;

/**
 * @see TheaterConfigSpec
 * @see TheaterConfigTest
 */
class TheaterConfig
{
    /** @var BoundedContextConfig[]|array */
    private $contexts;

    public function __construct(array $contexts)
    {
        Assert::allIsInstanceOf(
            $contexts,
            BoundedContextConfig::class,
            'Contexts should be instances of BoundedContextConfig'
        );
        $this->contexts = $contexts;
    }

    public function getContexts(): array
    {
        return $this->contexts;
    }

    public function addContext(BoundedContextConfig $config)
    {
        $this->contexts[] = $config;
    }

    public function hasContextByName(ContextName $contextName): bool
    {
        foreach ($this->contexts as $context) {
            if ($context->getName() == $contextName) {
                return true;
            }
        }

        return false;
    }

    public function getContextByName(ContextName $contextName): ?BoundedContextConfig
    {
        foreach ($this->contexts as $context) {
            if ($context->getName() == $contextName) {
                return $context;
            }
        }

        return null;
    }

    public function replaceContext(BoundedContextConfig $context)
    {
        foreach ($this->contexts as $key => $existingContext) {
            if ($existingContext->getName() == $context->getName()) {
                $this->contexts[$key] = $context;

                return true;
            }
        }

        return false;
    }

    public function toArray(): array
    {
        $contexts = [];

        foreach ($this->contexts as $context) {
            $contexts[$context->getName()->getValue()] = $context->toArray();
        }

        return ['contexts' => $contexts];
    }
}
