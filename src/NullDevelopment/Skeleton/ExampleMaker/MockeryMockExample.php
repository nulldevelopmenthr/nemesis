<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\ExampleMaker;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\ContractName;

/**
 * @see InstanceExampleSpec
 * @see InstanceExampleTest
 */
class MockeryMockExample implements Example
{
    /** @var ContractName */
    private $instanceOf;

    public function __construct(ContractName $instanceOf)
    {
        $this->instanceOf = $instanceOf;
    }

    public function __toString(): string
    {
        return sprintf('\Mockery::mock(\'%s\')', $this->instanceOf->getFullName());
    }

    public function classesToImport(): array
    {
        return [
            ClassName::create('Mockery'),
            $this->instanceOf,
        ];
    }

    public function asValue()
    {
        return $this->__toString();
    }
}
