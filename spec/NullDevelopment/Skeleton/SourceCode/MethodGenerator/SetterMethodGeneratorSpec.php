<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\SourceCode\Method\SetterMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\SetterMethodGenerator;
use PhpSpec\ObjectBehavior;

class SetterMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SetterMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_will_return_generated_code(SetterMethod $method, Property $property)
    {
        $method->getName()->shouldBeCalled()->willReturn('setFirstName');
        $method->isStatic()->shouldBeCalled()->willReturn(false);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$property]);
        $method->getPropertyName()->shouldBeCalled()->willReturn('firstName');

        $property->getName()->shouldBeCalled()->willReturn('firstName');
        $property->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');
        $property->isNullable()->shouldBeCalled()->willReturn(false);
        $property->hasDefaultValue()->shouldBeCalled()->willReturn(false);

        $lines = [
            'public function setFirstName(MyVendor\User\UserFirstName $firstName)',
            '{',
            "\t".'$this->firstName = $firstName;',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
