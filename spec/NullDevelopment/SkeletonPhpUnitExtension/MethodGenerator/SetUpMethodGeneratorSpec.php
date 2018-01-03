<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\InstanceExample;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use NullDevelopment\SkeletonPhpUnitExtension\Method\SetUpMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\SetUpMethodGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;
use PhpSpec\ObjectBehavior;

class SetUpMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SetUpMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_let_method_for_object_properties(
        ExampleMaker $exampleMaker,
        SetUpMethod $method,
        Property $property,
        ClassName $className
    ) {
        $method->getName()->shouldBeCalled()->willReturn('setUp');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');
        $method->getParameters()->shouldBeCalled()->willReturn([$property]);
        $method->getClassName()->shouldBeCalled()->willReturn($className);

        $className->getName()->shouldBeCalled()->willReturn('UserEntity');

        $property->isObject()->shouldBeCalled()->willReturn(true);
        $property->getName()->shouldBeCalled()->willReturn('firstName');

        $exampleMaker
            ->instance($property)
            ->shouldBeCalled()
            ->willReturn(new InstanceExample(ClassName::create('UserFirstName'), [new SimpleExample('firstName')]));

        $lines = [
            'public function setUp()',
            '{',
            "\t".'$this->firstName = new UserFirstName(\'firstName\');',
            "\t".'$this->sut = new UserEntity($this->firstName);',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
