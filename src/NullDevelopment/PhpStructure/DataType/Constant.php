<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataType;

use NullDevelopment\PhpStructure\DataTypeName\ConstantName;

/**
 * @see ConstantSpec
 * @see ConstantTest
 */
class Constant
{
    /** @var ConstantName */
    private $constantName;
    /** @var mixed */
    private $value;

    public function __construct(ConstantName $constantName, $value)
    {
        $this->constantName = $constantName;
        $this->value        = $value;
    }

    public function getConstantName(): ConstantName
    {
        return $this->constantName;
    }

    public function getValue()
    {
        return $this->value;
    }
}
