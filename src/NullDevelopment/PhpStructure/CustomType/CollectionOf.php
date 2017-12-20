<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\CustomType;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see ClassNameSpec
 * @see ClassNameTest
 */
class CollectionOf
{
    /** @var ClassName */
    private $className;
    /** @var string */
    private $accessor;
    /** @var ClassName */
    private $has;

    public function __construct(ClassName $className, string $accessor, ClassName $has)
    {
        $this->className = $className;
        $this->accessor  = $accessor;
        $this->has       = $has;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getAccessor(): string
    {
        return $this->accessor;
    }

    public function getHas(): ClassName
    {
        return $this->has;
    }
}
