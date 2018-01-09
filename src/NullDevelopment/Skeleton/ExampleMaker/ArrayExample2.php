<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\ExampleMaker;

/**
 * @see ArrayExampleSpec
 * @see ArrayExampleTest
 */
class ArrayExample2 implements Example
{
    /** @var array */
    private $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public static function create(array $values)
    {
        $zz = [];
        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $zz[$key] = self::create($value);
            } else {
                $zz[$key] = new SimpleExample($value);
            }
        }

        return new self($zz);
    }

    public function __toString(): string
    {
        $results = [];

        foreach ($this->values as $key => $value) {
            $results[] = "'".$key."'=>".$value->__toString();
        }

        return '['.implode(', ', $results).']';
    }

    public function classesToImport(): array
    {
        $result = [];

        foreach ($this->values as $value) {
            $result = array_merge($result, $value->classesToImport());
        }

        return $result;
    }

    public function asValue()
    {
        $results = [];

        foreach ($this->values as $key => $value) {
            $results[] = "'".$key."'=>".$value->asValue();
        }

        return '['.implode(', ', $results).']';
    }
}
