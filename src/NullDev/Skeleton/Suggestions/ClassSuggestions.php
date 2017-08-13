<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Suggestions;

use NullDev\Skeleton\Path\Readers\SourceCodePathReader;

/**
 * @see ClassSuggestionsSpec
 * @see ClassSuggestionsTest
 */
class ClassSuggestions
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

        foreach ($this->pathReader->getExistingSourceCodeClassNames() as $item) {
            $results[] = str_replace('\\', '/', $item);
        }

        return $results;
    }
}
