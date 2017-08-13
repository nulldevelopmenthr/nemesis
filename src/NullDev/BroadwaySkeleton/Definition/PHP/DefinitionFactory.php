<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Definition\PHP;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\DeserializeMethod;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\AggregateRootIdGetterMethod;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\CreateMethod;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\ReadModelIdGetterMethod;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\RepositoryConstructorMethod;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\SerializeMethod;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;

class DefinitionFactory
{
    public function createConstructorMethod(array $params): ConstructorMethod
    {
        return new ConstructorMethod($params);
    }

    public function createDeserializeMethod(ImprovedClassSource $classSource): DeserializeMethod
    {
        return new DeserializeMethod($classSource);
    }

    public function createSerializeMethod(ImprovedClassSource $classSource): SerializeMethod
    {
        return new SerializeMethod($classSource);
    }

    public function createBroadwayModelCreateMethod(ClassType $classType, array $parameters): CreateMethod
    {
        return new CreateMethod($classType, $parameters);
    }

    public function createBroadwayModelAggregateRootIdGetterMethod(Parameter $parameter): AggregateRootIdGetterMethod
    {
        return new AggregateRootIdGetterMethod($parameter);
    }

    public function createBroadwayModelRepositoryConstructorMethod(ClassType $classType): RepositoryConstructorMethod
    {
        return new RepositoryConstructorMethod($classType);
    }

    public function createReadModelIdGetterMethod(Parameter $parameter)
    {
        return new ReadModelIdGetterMethod($parameter);
    }
}
