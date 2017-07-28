<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see InitializableMethodFactorySpec
 * @see InitializableMethodFactoryTest
 */
class InitializableMethodFactory
{
    public function create(ImprovedClassSource $classSource): InitializableMethod
    {
        $data = [
            $classSource->getType(),
        ];

        if ($classSource->hasParent()) {
            $data[] = $classSource->getParent();
        }

        foreach ($classSource->getInterfaces() as $interface) {
            $data[] = $interface;
        }

        return new InitializableMethod($data);
    }
}
