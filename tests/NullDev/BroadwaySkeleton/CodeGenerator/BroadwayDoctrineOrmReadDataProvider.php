<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator;

use DateTime;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Ramsey\Uuid\Uuid;

class BroadwayDoctrineOrmReadDataProvider
{
    public function provideBroadwayDoctrineOrmReadEntity(): ImprovedClassSource
    {
        $classType  = new ClassType('ProductReadEntity', 'MyShop\ReadModel\Product');
        $parameters = [
            Parameter::create('productId', Uuid::class),
            Parameter::create('title', 'string'),
            Parameter::create('quantity', 'int'),
            Parameter::create('locationsAvailable', 'array'),
            Parameter::create('createdAt', DateTime::class),
        ];

        $factory = new DoctrineOrm\ReadEntitySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameters);
    }

    public function provideBroadwayDoctrineOrmReadFactory(): ImprovedClassSource
    {
        $classType = new ClassType('ProductReadFactory', 'MyShop\ReadModel\Product');
        $factory   = new DoctrineOrm\ReadFactorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType);
    }

    public function provideBroadwayDoctrineOrmReadRepository(): ImprovedClassSource
    {
        $classType = new ClassType('ProductReadRepository', 'MyShop\ReadModel\Product');

        $factory = new DoctrineOrm\ReadRepositorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType);
    }

    public function provideBroadwayDoctrineOrmReadProjector(): ImprovedClassSource
    {
        $classType  = new ClassType('ProductReadProjector', 'MyShop\ReadModel\Product');
        $parameters = [
            Parameter::create('repository', 'MyShop\ReadModel\Product\ProductReadRepository'),
            Parameter::create('factory', 'MyShop\ReadModel\Product\ProductReadFactory'),
        ];
        $factory = new DoctrineOrm\ReadProjectorSourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameters);
    }
}
