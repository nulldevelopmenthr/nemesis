<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;

interface PhpUnitSpecification
{
    public function getSubjectUnderTest(): ClassName;
}
