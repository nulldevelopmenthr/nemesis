<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRoot;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class EventSourcedAggregateRootFixtures
{
    public static function actorEntityName(): ClassName
    {
        return ClassName::create('MyVendor\\Theater\\Domain\\EventSourcedAggregateRoot\\CreateShow');
    }

    public static function idName(): ClassName
    {
        return ClassName::create('MyVendor\\Theater\\Domain\\Core\\ShowId');
    }

    public static function firstName(): ClassName
    {
        return ClassName::create('MyVendor\\Theater\\Domain\\Core\\FirstName');
    }

    public static function testActorEntityName(): ClassName
    {
        return ClassName::create('Tests\\MyVendor\\Theater\\Domain\\EventSourcedAggregateRoot\\CreateShowTest');
    }

    public static function specActorEntityName(): ClassName
    {
        return ClassName::create('spec\\MyVendor\\Theater\\Domain\\EventSourcedAggregateRoot\\CreateShowSpec');
    }

    public static function defaultTestCaseName(): ClassName
    {
        return ClassName::create('PHPUnit\\Framework\\TestCase');
    }

    public static function idProperty(): Property
    {
        return new Property(
            'id', self::idName(), false, false, false, new Visibility('private'), [new SimpleExample(123)]
        );
    }

    public static function firstNameProperty(): Property
    {
        return new Property(
            'firstName',
            self::firstName(),
            false,
            false,
            false,
            new Visibility('private'),
            [new SimpleExample('Greatest show of all times')]
        );
    }

    public static function actorEntity(): EventSourcedAggregateRoot
    {
        $className  = self::actorEntityName();
        $parentName = null;

        $properties = [
            self::idProperty(),
            self::firstNameProperty(),
        ];
        $methods = [
            new ConstructorMethod($properties),
            GetterMethod::create(self::idProperty()),
            GetterMethod::create(self::firstNameProperty()),
        ];

        return new EventSourcedAggregateRoot(
            $className,
            $parentName,
            [InterfaceName::create('SomeInterface')],
            [TraitName::create('SomeTrait')],
            [Constant::create('SOME_CONSTANT', 22)],
            $properties,
            $methods
        );
    }
}
