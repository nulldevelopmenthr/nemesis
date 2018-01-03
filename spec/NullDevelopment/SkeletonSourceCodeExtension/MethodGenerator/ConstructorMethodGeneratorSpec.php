<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\Core\MethodGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\ConstructorMethodGenerator;
use PhpSpec\ObjectBehavior;

class ConstructorMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ConstructorMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_will_return_generated_code(ConstructorMethod $method, Property $property)
    {
        $method->getName()->shouldBeCalled()->willReturn('__construct');
        $method->isStatic()->shouldBeCalled()->willReturn(false);
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$property]);

        $property->getName()->shouldBeCalled()->willReturn('firstName');
        $property->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\User\\UserFirstName');
        $property->isNullable()->shouldBeCalled()->willReturn(false);
        $property->hasDefaultValue()->shouldBeCalled()->willReturn(false);

        $lines = [
            'public function __construct(MyVendor\User\UserFirstName $firstName)',
            '{',
            "\t".'$this->firstName = $firstName;',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
