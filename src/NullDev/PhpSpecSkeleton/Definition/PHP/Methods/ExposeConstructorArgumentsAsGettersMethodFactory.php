<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see ExposeConstructorArgumentsAsGettersMethodFactorySpec
 * @see ExposeConstructorArgumentsAsGettersMethodFactoryTest
 */
class ExposeConstructorArgumentsAsGettersMethodFactory
{
    public function create(ImprovedClassSource $classSource): ExposeConstructorArgumentsAsGettersMethod
    {
        return new ExposeConstructorArgumentsAsGettersMethod($this->getConstructorParametersForLets($classSource));
    }

    private function getConstructorParametersForLets(ImprovedClassSource $classSource): array
    {
        $lets = $classSource->getConstructorParameters();

        if ($classSource->getParentFullName() === EventSourcingRepository::class) {
            $lets[] = new Parameter('eventStore', InterfaceType::createFromFullyQualified(EventStore::class));
            $lets[] = new Parameter('eventBus', InterfaceType::createFromFullyQualified(EventBus::class));
            $lets[] = new Parameter('eventStreamDecorators', new ArrayType());
        }

        return $lets;
    }
}
