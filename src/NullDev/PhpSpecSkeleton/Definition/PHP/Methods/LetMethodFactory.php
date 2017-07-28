<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see LetMethodFactorySpec
 * @see LetMethodFactoryTest
 */
class LetMethodFactory
{
    public function create(ImprovedClassSource $classSource): LetMethod
    {
        return new LetMethod($this->getConstructorParametersForLets($classSource));
    }

    private function getConstructorParametersForLets(ImprovedClassSource $classSource): array
    {
        $lets = $classSource->getConstructorParameters();

        return $lets;
    }
}
