<?php

declare(strict_types=1);

namespace NullDev\Theater\Config;

use NullDev\Theater\BoundedContext\BoundedContextConfigFactory;
use NullDev\Theater\ReadSide\ReadSideConfigFactory;

/**
 * @see TheaterConfigFactorySpec
 * @see TheaterConfigFactoryTest
 */
class TheaterConfigFactory
{
    /** @var BoundedContextConfigFactory */
    private $boundedContextConfigFactory;

    /** @var ReadSideConfigFactory */
    private $readSideConfigFactory;

    public function __construct(
        BoundedContextConfigFactory $boundedContextConfigFactory,
        ReadSideConfigFactory $readSideConfigFactory
    ) {
        $this->boundedContextConfigFactory = $boundedContextConfigFactory;
        $this->readSideConfigFactory       = $readSideConfigFactory;
    }

    public function createFromArray(array $data): TheaterConfig
    {
        $contexts = [];
        $reads    = [];

        foreach ($data['contexts'] as $name => $contextData) {
            $contexts[] = $this->boundedContextConfigFactory->createFromArray($name, $contextData);
        }
        foreach ($data['reads'] as $name => $contextData) {
            $reads[] = $this->readSideConfigFactory->createFromArray($name, $contextData);
        }

        return new TheaterConfig($contexts, $reads);
    }
}
