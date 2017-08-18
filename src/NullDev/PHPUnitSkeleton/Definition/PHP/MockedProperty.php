<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\Definition\PHP;

use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;

/**
 * @see MockedPropertySpec
 * @see MockedPropertyTest
 */
class MockedProperty extends Property
{
    public function getTypeForDocBlock(): string
    {
        if (null === $this->getType()) {
            return '';
        }

        if ($this->getType() instanceof TypeDeclaration) {
            return $this->getTypeShortName();
        }

        return 'MockInterface|'.$this->getTypeShortName();
    }
}
