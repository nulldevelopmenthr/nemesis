<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Command;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommand;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommand;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\Command;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\SetUpMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestGetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CommandFixtures
{
    public static function createShowCommandName(): ClassName
    {
        return ClassName::create('MyVendor\\Theater\\Domain\\Command\\CreateShow');
    }

    public static function idName(): ClassName
    {
        return ClassName::create('MyVendor\\Theater\\Domain\\Core\\ShowId');
    }

    public static function titleName(): ClassName
    {
        return ClassName::create('MyVendor\\Theater\\Domain\\Core\\Title');
    }

    public static function testCreateShowCommandName(): ClassName
    {
        return ClassName::create('Tests\\MyVendor\\Theater\\Domain\\Command\\CreateShowTest');
    }

    public static function specCreateShowCommandName(): ClassName
    {
        return ClassName::create('spec\\MyVendor\\Theater\\Domain\\Command\\CreateShowSpec');
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

    public static function createShowCommand(): Command
    {
        $className  = self::createShowCommandName();
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

        return new Command(
            $className,
            $parentName,
            [InterfaceName::create('SomeInterface')],
            [TraitName::create('SomeTrait')],
            [Constant::create('SOME_CONSTANT', 22)],
            $properties,
            $methods
        );
    }

    public static function testCreateShowCommand(): TestCommand
    {
        $className  = self::testCreateShowCommandName();
        $parentName = self::defaultTestCaseName();
        $interfaces = [];
        $traits     = [];
        $constants  = [];
        $properties = [
            self::idProperty(),
            self::titleProperty(),
            new Property('sut', self::createShowCommandName(), false, false, null, new Visibility('private')),
        ];
        $methods = [
            new SetUpMethod(self::createShowCommandName(), [self::idProperty(), self::titleProperty()]),
            new TestGetterMethod('testGetId', 'getId', self::idProperty()),
            new TestGetterMethod('testGetTitle', 'getTitle', self::titleProperty()),
        ];
        $sutName = self::createShowCommandName();

        return new TestCommand(
            $className, $parentName, $interfaces, $traits, $constants, $properties, $methods, $sutName
        );
    }

    public static function specCreateShowCommand(): SpecCommand
    {
        $className  = self::specCreateShowCommandName();
        $parentName = ClassName::create('PhpSpec\ObjectBehavior');
        $interfaces = [];
        $traits     = [];
        $constants  = [];
        $properties = [
        ];
        $methods = [
            new LetMethod([self::idProperty(), self::titleProperty()]),
            new InitializableMethod(self::createShowCommandName(), null, [InterfaceName::create('SomeInterface')]),
            new SpecGetterMethod('it_exposes_id', 'getId', self::idProperty()),
            new SpecGetterMethod('it_exposes_title', 'getTitle', self::titleProperty()),
        ];
        $sutName = self::createShowCommandName();

        return new SpecCommand(
            $className, $parentName, $interfaces, $traits, $constants, $properties, $methods, $sutName
        );
    }
}
