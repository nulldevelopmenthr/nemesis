<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\CodeGenerator;

use DateTime;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\CommandSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;
use Ramsey\Uuid\Uuid;

class BroadwayModelDataProvider
{
    public function provideUuidIdentifier(): ImprovedClassSource
    {
        $classType = new ClassType('SomeClass', 'SomeNamespace');

        $factory = new Uuid4IdentitySourceFactory(new ClassSourceFactory());

        return $factory->create($classType);
    }

    public function provideBroadwayCommand(): ImprovedClassSource
    {
        $classType  = new ClassType('CreateProduct', 'MyShop\Command');
        $parameters = [
            Parameter::create('productId', Uuid::class),
            Parameter::create('title', 'string'),
        ];

        $factory = new CommandSourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameters);
    }

    public function provideBroadwayEvent(): ImprovedClassSource
    {
        $classType  = new ClassType('ProductCreated', 'MyShop\Event');
        $parameters = [
            Parameter::create('productId', Uuid::class),
            Parameter::create('title', 'string'),
            Parameter::create('quantity', 'int'),
            Parameter::create('locationsAvailable', 'array'),
            Parameter::create('createdAt', DateTime::class),
        ];

        $factory = new EventSourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameters);
    }

    public function provideBroadwayModel(): ImprovedClassSource
    {
        $classType = new ClassType('ProductModel', 'MyShop\Model');
        $parameter = Parameter::create('productId', 'MyShop\Model\ProductUuid');

        $factory = new EventSourcedAggregateRootSourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameter);
    }

    public function provideBroadwayModelRepository(): ImprovedClassSource
    {
        $classType      = ClassType::createFromFullyQualified('MyShop\Model\ProductModelRepository');
        $modelClassType = ClassType::createFromFullyQualified('MyShop\Model\ProductModel');

        $factory = new EventSourcingRepositorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $modelClassType);
    }
}
