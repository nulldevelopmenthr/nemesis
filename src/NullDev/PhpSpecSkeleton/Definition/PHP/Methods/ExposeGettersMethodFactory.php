<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see ExposeGettersMethodFactorySpec
 * @see ExposeGettersMethodFactoryTest
 */
class ExposeGettersMethodFactory
{
    public function create(ImprovedClassSource $classSource): ExposeGettersMethod
    {
        return new ExposeGettersMethod($this->getGetterMethods($classSource));
    }

    private function getGetterMethods(ImprovedClassSource $classSource): array
    {
        $lets = [];

        foreach ($classSource->getMethods() as $method) {
            if ($method instanceof GetterMethod) {
                $lets[] = $method->getParameter();
            }
        }

        return $lets;
    }
}
