<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\CodeGenerator;

use DateTime;
use NullDev\BroadwaySkeleton\SourceFactory\CommandSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch;
use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\SourceFactory\Uuid4IdentitySourceFactory;
use Ramsey\Uuid\Uuid;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @group  FullCoverage
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class BaseCodeGeneratorTest extends ContainerSupportedTestCase
{
    protected function provideUuidIdentifier(): ImprovedClassSource
    {
        $classType = new ClassType('SomeClass', 'SomeNamespace');

        $factory = new Uuid4IdentitySourceFactory(new ClassSourceFactory());

        return $factory->create($classType);
    }

    protected function provideBroadwayCommand(): ImprovedClassSource
    {
        $classType  = new ClassType('CreateProduct', 'MyShop\\Command');
        $parameters = [
            Parameter::create('productId', Uuid::class),
            Parameter::create('title', 'string'),
        ];

        $factory = new CommandSourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameters);
    }

    protected function provideBroadwayEvent(): ImprovedClassSource
    {
        $classType  = new ClassType('ProductCreated', 'MyShop\\Event');
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

    protected function provideBroadwayModel(): ImprovedClassSource
    {
        $classType = new ClassType('ProductModel', 'MyShop\\Model');
        $parameter = Parameter::create('productId', 'MyShop\\Model\\ProductUuid');

        $factory = new EventSourcedAggregateRootSourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameter);
    }

    protected function provideBroadwayModelRepository(): ImprovedClassSource
    {
        $classType      = ClassType::createFromFullyQualified('MyShop\\Model\\ProductModelRepository');
        $modelClassType = ClassType::createFromFullyQualified('MyShop\\Model\\ProductModel');

        $factory = new EventSourcingRepositorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $modelClassType);
    }

    protected function provideBroadwayElasticSearchReadEntity(): ImprovedClassSource
    {
        $classType  = new ClassType('ProductReadEntity', 'MyShop\\ReadModel\\Product');
        $parameters = [
            Parameter::create('productId', Uuid::class),
            Parameter::create('title', 'string'),
            Parameter::create('quantity', 'int'),
            Parameter::create('locationsAvailable', 'array'),
            Parameter::create('createdAt', DateTime::class),
        ];

        $factory = new ElasticSearch\ReadEntitySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameters);
    }

    protected function provideBroadwayElasticSearchReadRepository(): ImprovedClassSource
    {
        $classType = new ClassType('ProductReadRepository', 'MyShop\\ReadModel\\Product');

        $factory = new ElasticSearch\ReadRepositorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType);
    }

    protected function provideBroadwayElasticSearchReadProjector(): ImprovedClassSource
    {
        $classType  = new ClassType('ProductReadProjector', 'MyShop\\ReadModel\\Product');
        $parameters = [
            Parameter::create('repository', 'MyShop\\ReadModel\\Product\\ProductReadRepository'),
        ];
        $factory = new ElasticSearch\ReadProjectorSourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameters);
    }

    protected function provideBroadwayDoctrineOrmReadEntity(): ImprovedClassSource
    {
        $classType  = new ClassType('ProductReadEntity', 'MyShop\\ReadModel\\Product');
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

    protected function provideBroadwayDoctrineOrmReadFactory(): ImprovedClassSource
    {
        $classType = new ClassType('ProductReadFactory', 'MyShop\\ReadModel\\Product');
        $factory   = new DoctrineOrm\ReadFactorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType);
    }

    protected function provideBroadwayDoctrineOrmReadRepository(): ImprovedClassSource
    {
        $classType = new ClassType('ProductReadRepository', 'MyShop\\ReadModel\\Product');

        $factory = new DoctrineOrm\ReadRepositorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType);
    }

    protected function provideBroadwayDoctrineOrmReadProjector(): ImprovedClassSource
    {
        $classType  = new ClassType('ProductReadProjector', 'MyShop\\ReadModel\\Product');
        $parameters = [
            Parameter::create('repository', 'MyShop\\ReadModel\\Product\\ProductReadRepository'),
            Parameter::create('factory', 'MyShop\\ReadModel\\Product\\ProductReadFactory'),
        ];
        $factory = new DoctrineOrm\ReadProjectorSourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameters);
    }

    protected function provideClassType(): ClassType
    {
        return new ClassType('Senior', 'Developer');
    }

    protected function provideParentClassType(): ClassType
    {
        return new ClassType('Person', 'Human');
    }

    protected function provideInterfaceType1(): InterfaceType
    {
        return new InterfaceType('Coder');
    }

    protected function provideInterfaceType2(): InterfaceType
    {
        return new InterfaceType('Coder2');
    }

    protected function provideTraitType1(): TraitType
    {
        return new TraitType('SomeTrait');
    }

    protected function provideTraitType2(): TraitType
    {
        return new TraitType('SomeTrait2');
    }

    protected function getFileContent(string $fileName): string
    {
        return file_get_contents(__DIR__.'/sample-output/'.$fileName.'.output');
    }
}
