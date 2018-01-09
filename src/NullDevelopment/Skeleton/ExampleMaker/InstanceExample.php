<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\ExampleMaker;

use NullDevelopment\PhpStructure\DataTypeName\ContractName;

/**
 * @see InstanceExampleSpec
 * @see InstanceExampleTest
 */
class InstanceExample implements Example
{
    /** @var ContractName */
    private $instanceOf;

    /** @var array */
    private $parameters;

    public function __construct(ContractName $instanceOf, array $parameters)
    {
        $this->instanceOf = $instanceOf;
        $this->parameters = $parameters;
    }

    public function __toString(): string
    {
        $arguments = [];

        foreach ($this->parameters as $parameter) {
            $arguments[] = $parameter->__toString();
        }

        return sprintf('new %s(%s)', $this->instanceOf->getName(), implode(', ', $arguments));
    }

    public function classesToImport(): array
    {
        $result = [$this->instanceOf];

        foreach ($this->parameters as $parameter) {
            $result = array_merge($result, $parameter->classesToImport());
        }

        return $result;
    }

    public function asValue()
    {
        if (count($this->parameters) > 1) {
            return (new ArrayExample2($this->parameters))->asValue();
        } elseif (1 === count($this->parameters)) {
            return array_pop($this->parameters)->asValue();
        }
    }
}
