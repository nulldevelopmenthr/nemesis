<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use NullDev\Skeleton\Definition\PHP\Parameter;
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

        if ($classSource->getParentFullName() === EventSourcingRepository::class) {
            $lets[] = Parameter::create('eventStore', EventStore::class);
            $lets[] = Parameter::create('eventBus', EventBus::class);
            $lets[] = Parameter::create('eventStreamDecorators', 'array');
        }

        return $lets;
    }
}
