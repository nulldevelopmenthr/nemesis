<?php

declare(strict_types=1);

namespace NullDev\Theater\Config;

use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\ReadSide\ReadSideConfig;
use NullDev\Theater\ReadSide\ReadSideName;
use Webmozart\Assert\Assert;

/**
 * @see TheaterConfigSpec
 * @see TheaterConfigTest
 */
class TheaterConfig
{
    /** @var BoundedContextConfig[]|array */
    private $contexts;

    /** @var ReadSideConfig[]|array */
    private $reads;

    public function __construct(array $contexts, array $reads)
    {
        Assert::allIsInstanceOf(
            $contexts,
            BoundedContextConfig::class,
            'Contexts should be instances of BoundedContextConfig'
        );

        Assert::allIsInstanceOf(
            $reads,
            ReadSideConfig::class,
            'Read sides should be instances of ReadSideConfig'
        );

        $this->contexts = $contexts;
        $this->reads    = $reads;
    }

    public function getContexts(): array
    {
        return $this->contexts;
    }

    public function getReads(): array
    {
        return $this->reads;
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

    public function addReadSide(ReadSideConfig $readSideConfig)
    {
        $this->reads[] = $readSideConfig;
    }

    public function hasReadSideByName(ReadSideName $readSideName): bool
    {
        foreach ($this->reads as $readSide) {
            if ($readSide->getName() == $readSideName) {
                return true;
            }
        }

        return false;
    }

    public function getReadSideByName(ReadSideName $readSideName): ?ReadSideConfig
    {
        foreach ($this->reads as $readSide) {
            if ($readSide->getName() == $readSideName) {
                return $readSide;
            }
        }

        return null;
    }

    public function replaceReadSide(ReadSideConfig $readSide)
    {
        foreach ($this->reads as $key => $existingReadSide) {
            if ($existingReadSide->getName() == $readSide->getName()) {
                $this->reads[$key] = $readSide;

                return true;
            }
        }

        return false;
    }

    public function toArray(): array
    {
        $contexts = [];
        $reads    = [];

        foreach ($this->contexts as $context) {
            $contexts[$context->getName()->getValue()] = $context->toArray();
        }

        foreach ($this->reads as $read) {
            $reads[$read->getName()->getValue()] = $read->toArray();
        }

        return [
            'contexts' => $contexts,
            'reads'    => $reads,
        ];
    }
}
