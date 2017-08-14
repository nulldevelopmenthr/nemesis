<?php

declare(strict_types=1);

namespace NullDev\Theater\Config;

use NullDev\Theater\BoundedContext\BoundedContextConfigFactory;

/**
 * @see TheaterConfigFactorySpec
 * @see TheaterConfigFactoryTest
 */
class TheaterConfigFactory
{
    /** @var BoundedContextConfigFactory */
    private $boundedContextConfigFactory;

    public function __construct(BoundedContextConfigFactory $boundedContextConfigFactory)
    {
        $this->boundedContextConfigFactory = $boundedContextConfigFactory;
    }

    public function createFromArray(array $data): TheaterConfig
    {
        $contexts = [];

        foreach ($data['contexts'] as $name => $contextData) {
            $contexts[] = $this->boundedContextConfigFactory->createFromArray($name, $contextData);
        }

        return new TheaterConfig($contexts);
    }
}
