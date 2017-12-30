<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\Method;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see TestDateTimeSetUpMethodSpec
 * @see TestDateTimeSetUpMethodTest
 */
class TestDateTimeSetUpMethod extends BaseTestMethod
{
    /** @var ClassName */
    private $className;

    public function __construct(ClassName $className)
    {
        $this->className = $className;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getName(): string
    {
        return 'setUp';
    }

    /** @return \NullDevelopment\PhpStructure\DataType\Property[] */
    public function getParameters(): array
    {
        return [];
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [];
    }
}
