<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Suggestions;

use NullDev\Skeleton\Path\Readers\SourceCodePathReader;

/**
 * @see InterfaceSuggestionsSpec
 * @see InterfaceSuggestionsTest
 */
class InterfaceSuggestions
{
    /** @var SourceCodePathReader */
    private $pathReader;

    public function __construct(SourceCodePathReader $pathReader)
    {
        $this->pathReader = $pathReader;
    }

    public function suggest(): array
    {
        $results = [];

        foreach ($this->pathReader->getExistingInterfaceNames() as $item) {
            $results[] = str_replace('\\', '/', $item);
        }

        return $results;
    }
}
