<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandler;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandler;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\SetUpMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestGetterMethod;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CommandHandlerFixtures
{
    public static function actorEntityName(): ClassName
    {
        return ClassName::create('MyVendor\\Theater\\Domain\\CommandHandler\\CreateShow');
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
        return ClassName::create('Tests\\MyVendor\\Theater\\Domain\\CommandHandler\\CreateShowTest');
    }

    public static function specActorEntityName(): ClassName
    {
        return ClassName::create('spec\\MyVendor\\Theater\\Domain\\CommandHandler\\CreateShowSpec');
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

    public static function actorEntity(): CommandHandler
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

        return new CommandHandler(
            $className,
            $parentName,
            [InterfaceName::create('SomeInterface')],
            [TraitName::create('SomeTrait')],
            [Constant::create('SOME_CONSTANT', 22)],
            $properties,
            $methods
        );
    }

    public static function testActorEntity(): TestCommandHandler
    {
        $className  = self::testActorEntityName();
        $parentName = self::defaultTestCaseName();
        $interfaces = [];
        $traits     = [];
        $constants  = [];
        $properties = [
            self::idProperty(),
            self::firstNameProperty(),
            new Property('sut', self::actorEntityName(), false, false, null, new Visibility('private')),
        ];
        $methods = [
            new SetUpMethod(self::actorEntityName(), [self::idProperty(), self::firstNameProperty()]),
            new TestGetterMethod('testGetId', 'getId', self::idProperty()),
            new TestGetterMethod('testGetFirstName', 'getFirstName', self::firstNameProperty()),
        ];
        $sutName = self::actorEntityName();

        return new TestCommandHandler(
            $className, $parentName, $interfaces, $traits, $constants, $properties, $methods, $sutName
        );
    }

    public static function specActorEntity(): SpecCommandHandler
    {
        $className  = self::specActorEntityName();
        $parentName = ClassName::create('PhpSpec\ObjectBehavior');
        $interfaces = [];
        $traits     = [];
        $constants  = [];
        $properties = [
        ];
        $methods = [
            new LetMethod([self::idProperty(), self::firstNameProperty()]),
            new InitializableMethod(self::actorEntityName(), null, [InterfaceName::create('SomeInterface')]),
            new SpecGetterMethod('it_exposes_id', 'getId', self::idProperty()),
            new SpecGetterMethod('it_exposes_first_name', 'getFirstName', self::firstNameProperty()),
        ];
        $sutName = self::actorEntityName();

        return new SpecCommandHandler(
            $className, $parentName, $interfaces, $traits, $constants, $properties, $methods, $sutName
        );
    }
}
