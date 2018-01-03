<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SingleValueObject;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\SingleValueObjectGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\ConstructorMethodGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\GetterMethodGenerator;
use PhpSpec\ObjectBehavior;

class SingleValueObjectGeneratorSpec extends ObjectBehavior
{
    public function let(
        ConstructorMethodGenerator $constructorMethodGenerator,
        GetterMethodGenerator $getterMethodGenerator
    ) {
        $constructorMethodGenerator->getMethodGeneratorPriority()->willReturn(10);
        $getterMethodGenerator->getMethodGeneratorPriority()->willReturn(50);
        $this->beConstructedWith([$constructorMethodGenerator, $getterMethodGenerator]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SingleValueObjectGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }

    public function it_supports_single_value_object(SingleValueObject $definition)
    {
        $this->supports($definition)->shouldReturn(true);
    }

    public function it_creates_class_code(SingleValueObject $definition)
    {
        $definition->getInstanceOfName()->shouldBeCalled()->willReturn('UserEntity');
        $definition->getNamespace()->shouldBeCalled()->willReturn('MyVendor\\WebShop');
        $definition->getInstanceOfFullName()->shouldBeCalled()->willReturn('MyVendor\\WebShop\\UserEntity');
        $definition->hasParent()->shouldBeCalled()->willReturn(false);
        $definition->getInterfaces()->shouldBeCalled()->willReturn([]);
        $definition->getTraits()->shouldBeCalled()->willReturn([]);
        $definition->getConstants()->shouldBeCalled()->willReturn([]);
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getMethods()->shouldBeCalled()->willReturn([]);

        $lines = [
            'namespace MyVendor\\WebShop;',
            '',
            '/**',
            ' * @see \spec\MyVendor\WebShop\UserEntitySpec',
            ' * @see \Tests\MyVendor\WebShop\UserEntityTest',
            ' */',
            'class UserEntity',
            '{',
            '}',
            '',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($definition)->shouldReturn($expected);
    }

    public function it_creates_class_code_with_parent(SingleValueObject $definition)
    {
        $definition->getInstanceOfName()->shouldBeCalled()->willReturn('UserEntity');
        $definition->getNamespace()->shouldBeCalled()->willReturn('MyVendor\\WebShop');
        $definition->getInstanceOfFullName()->shouldBeCalled()->willReturn('MyVendor\\WebShop\\UserEntity');
        $definition->hasParent()->shouldBeCalled()->willReturn(true);
        $definition->getParentFullClassName()->shouldBeCalled()->willReturn('MyVendor\\Core\\BaseModel');
        $definition->getParentAlias()->shouldBeCalled()->willReturn(null);
        $definition->getInterfaces()->shouldBeCalled()->willReturn([]);
        $definition->getTraits()->shouldBeCalled()->willReturn([]);
        $definition->getConstants()->shouldBeCalled()->willReturn([]);
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getMethods()->shouldBeCalled()->willReturn([]);

        $lines = [
            'namespace MyVendor\\WebShop;',
            '',
            'use MyVendor\\Core\\BaseModel;',
            '',
            '/**',
            ' * @see \spec\MyVendor\WebShop\UserEntitySpec',
            ' * @see \Tests\MyVendor\WebShop\UserEntityTest',
            ' */',
            'class UserEntity extends BaseModel',
            '{',
            '}',
            '',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($definition)->shouldReturn($expected);
    }

    public function it_creates_class_code_with_interfaces(SingleValueObject $definition, InterfaceName $interfaceName)
    {
        $definition->getInstanceOfName()->shouldBeCalled()->willReturn('UserEntity');
        $definition->getNamespace()->shouldBeCalled()->willReturn('MyVendor\\WebShop');
        $definition->getInstanceOfFullName()->shouldBeCalled()->willReturn('MyVendor\\WebShop\\UserEntity');
        $definition->hasParent()->shouldBeCalled()->willReturn(false);
        $definition->getInterfaces()->shouldBeCalled()->willReturn([$interfaceName]);
        $definition->getTraits()->shouldBeCalled()->willReturn([]);
        $definition->getConstants()->shouldBeCalled()->willReturn([]);
        $interfaceName->getFullName()->shouldBeCalled()->willReturn('MyVendor\\Core\\SomeInterface');
        $interfaceName->getAlias()->shouldBeCalled()->willReturn(null);
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getMethods()->shouldBeCalled()->willReturn([]);

        $lines = [
            'namespace MyVendor\\WebShop;',
            '',
            'use MyVendor\\Core\\SomeInterface;',
            '',
            '/**',
            ' * @see \spec\MyVendor\WebShop\UserEntitySpec',
            ' * @see \Tests\MyVendor\WebShop\UserEntityTest',
            ' */',
            'class UserEntity implements SomeInterface',
            '{',
            '}',
            '',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($definition)->shouldReturn($expected);
    }

    public function it_creates_class_code_with_properties(SingleValueObject $definition, Property $firstName)
    {
        $definition->getInstanceOfName()->shouldBeCalled()->willReturn('UserEntity');
        $definition->getNamespace()->shouldBeCalled()->willReturn('MyVendor\\WebShop');
        $definition->getInstanceOfFullName()->shouldBeCalled()->willReturn('MyVendor\\WebShop\\UserEntity');
        $definition->hasParent()->shouldBeCalled()->willReturn(false);
        $definition->getInterfaces()->shouldBeCalled()->willReturn([]);
        $definition->getTraits()->shouldBeCalled()->willReturn([]);
        $definition->getConstants()->shouldBeCalled()->willReturn([]);
        $definition->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $firstName->getName()->shouldBeCalled()->willReturn('firstName');
        $firstName->getInstanceNameAsString()->shouldBeCalled()->willReturn('UserFirstName');
        $firstName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\WebShop\\User\\UserFirstName');
        $firstName->getVisibility()->shouldBeCalled()->willReturn(new Visibility('private'));
        $firstName->hasDefaultValue()->shouldBeCalled()->willReturn(false);
        $firstName->isObject()->shouldBeCalled()->willReturn(true);
        $firstName->isNullable()->shouldBeCalled()->willReturn(false);
        $definition->getMethods()->shouldBeCalled()->willReturn([]);

        $lines = [
            'namespace MyVendor\\WebShop;',
            '',
            'use MyVendor\WebShop\User\UserFirstName;',
            '',
            '/**',
            ' * @see \spec\MyVendor\WebShop\UserEntitySpec',
            ' * @see \Tests\MyVendor\WebShop\UserEntityTest',
            ' */',
            'class UserEntity',
            '{',
            "\t".'/** @var UserFirstName */',
            "\t".'private $firstName;',
            '',
            '',
            '}',
            '',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($definition)->shouldReturn($expected);
    }

    public function it_creates_class_code_with_property_having_default_value(
        SingleValueObject $definition,
        Property $lastName
    ) {
        $definition->getInstanceOfName()->shouldBeCalled()->willReturn('UserEntity');
        $definition->getNamespace()->shouldBeCalled()->willReturn('MyVendor\\WebShop');
        $definition->getInstanceOfFullName()->shouldBeCalled()->willReturn('MyVendor\\WebShop\\UserEntity');
        $definition->hasParent()->shouldBeCalled()->willReturn(false);
        $definition->getInterfaces()->shouldBeCalled()->willReturn([]);
        $definition->getTraits()->shouldBeCalled()->willReturn([]);
        $definition->getConstants()->shouldBeCalled()->willReturn([]);
        $definition->getProperties()->shouldBeCalled()->willReturn([$lastName]);
        $definition->getMethods()->shouldBeCalled()->willReturn([]);

        $lastName->getName()->shouldBeCalled()->willReturn('lastName');
        $lastName->getInstanceNameAsString()->shouldBeCalled()->willReturn('UserLastName');
        $lastName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\WebShop\\User\\UserLastName');
        $lastName->getVisibility()->shouldBeCalled()->willReturn(new Visibility('private'));
        $lastName->hasDefaultValue()->shouldBeCalled()->willReturn(true);
        $lastName->isObject()->shouldBeCalled()->willReturn(true);
        $lastName->isNullable()->shouldBeCalled()->willReturn(false);
        $lastName->getDefaultValue()->shouldBeCalled()->willReturn('Smith');

        $lines = [
            'namespace MyVendor\\WebShop;',
            '',
            'use MyVendor\WebShop\User\UserLastName;',
            '',
            '/**',
            ' * @see \spec\MyVendor\WebShop\UserEntitySpec',
            ' * @see \Tests\MyVendor\WebShop\UserEntityTest',
            ' */',
            'class UserEntity',
            '{',
            "\t".'/** @var UserLastName */',
            "\t".'private $lastName = \'Smith\';',
            '',
            '',
            '}',
            '',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($definition)->shouldReturn($expected);
    }
}
