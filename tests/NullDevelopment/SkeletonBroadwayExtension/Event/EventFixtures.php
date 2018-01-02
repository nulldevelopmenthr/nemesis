<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEvent;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEvent;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Event;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\SetUpMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestGetterMethod;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class EventFixtures
{
    public static function showCreatedEventName(): ClassName
    {
        return ClassName::create('MyVendor\\Theater\\Domain\\Event\\CreateShow');
    }

    public static function idName(): ClassName
    {
        return ClassName::create('MyVendor\\Theater\\Domain\\Core\\ShowId');
    }

    public static function titleName(): ClassName
    {
        return ClassName::create('MyVendor\\Theater\\Domain\\Core\\Title');
    }

    public static function testShowCreatedEventName(): ClassName
    {
        return ClassName::create('Tests\\MyVendor\\Theater\\Domain\\Event\\CreateShowTest');
    }

    public static function specShowCreatedEventName(): ClassName
    {
        return ClassName::create('spec\\MyVendor\\Theater\\Domain\\Event\\CreateShowSpec');
    }

    public static function defaultTestCaseName(): ClassName
    {
        return ClassName::create('PHPUnit\\Framework\\TestCase');
    }

    public static function idProperty(): Property
    {
        return new Property(
            'id',
            self::idName(),
            false,
            false,
            false,
            new Visibility('private'),
            [new SimpleExample(123)]
        );
    }

    public static function titleProperty(): Property
    {
        return new Property(
            'title',
            self::titleName(),
            false,
            false,
            false,
            new Visibility('private'),
            [new SimpleExample('Greatest show of all times')]
        );
    }

    public static function showCreatedEvent(): Event
    {
        $className  = self::showCreatedEventName();
        $parentName = null;

        $properties = [
            self::idProperty(),
            self::titleProperty(),
        ];
        $methods = [
            new ConstructorMethod($properties),
            GetterMethod::create(self::idProperty()),
            GetterMethod::create(self::titleProperty()),
        ];

        return new Event(
            $className,
            $parentName,
            [InterfaceName::create('SomeInterface')],
            [TraitName::create('SomeTrait')],
            [Constant::create('SOME_CONSTANT', 22)],
            $properties,
            $methods
        );
    }

    public static function testShowCreatedEvent(): TestEvent
    {
        $className  = self::testShowCreatedEventName();
        $parentName = self::defaultTestCaseName();
        $interfaces = [];
        $traits     = [];
        $constants  = [];
        $properties = [
            self::idProperty(),
            self::titleProperty(),
            new Property('sut', self::showCreatedEventName(), false, false, null, new Visibility('private')),
        ];
        $methods = [
            new SetUpMethod(self::showCreatedEventName(), [self::idProperty(), self::titleProperty()]),
            new TestGetterMethod('testGetId', 'getId', self::idProperty()),
            new TestGetterMethod('testGetTitle', 'getTitle', self::titleProperty()),
        ];
        $sutName = self::showCreatedEventName();

        return new TestEvent(
            $className, $parentName, $interfaces, $traits, $constants, $properties, $methods, $sutName
        );
    }

    public static function specShowCreatedEvent(): SpecEvent
    {
        $className  = self::specShowCreatedEventName();
        $parentName = ClassName::create('PhpSpec\ObjectBehavior');
        $interfaces = [];
        $traits     = [];
        $constants  = [];
        $properties = [
        ];
        $methods = [
            new LetMethod([self::idProperty(), self::titleProperty()]),
            new InitializableMethod(self::showCreatedEventName(), null, [InterfaceName::create('SomeInterface')]),
            new SpecGetterMethod('it_exposes_id', 'getId', self::idProperty()),
            new SpecGetterMethod('it_exposes_title', 'getTitle', self::titleProperty()),
        ];
        $sutName = self::showCreatedEventName();

        return new SpecEvent(
            $className, $parentName, $interfaces, $traits, $constants, $properties, $methods, $sutName
        );
    }
}
