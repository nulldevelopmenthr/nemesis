<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\ExampleMaker;

/**
 * @see ArrayExampleSpec
 * @see ArrayExampleTest
 */
class ArrayExample implements Example
{
    /** @var array */
    private $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function __toString(): string
    {
        $results = [];

        foreach ($this->values as $value) {
            if (true === is_string($value)) {
                $results[] = '"'.$value.'"';
            } elseif ($value instanceof Example) {
                $results[] = $value->__toString();
            } else {
                $results[] = $value;
            }
        }

        return '['.implode(', ', $results).']';
    }

    public function classesToImport(): array
    {
        $result = [];

        foreach ($this->values as $value) {
            if ($value instanceof Example) {
                $result = array_merge($result, $value->classesToImport());
            }
        }

        return $result;
    }
}
