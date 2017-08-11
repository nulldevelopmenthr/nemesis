<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Source;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class ImprovedClassSourceSpec extends ObjectBehavior
{
    public function let(ClassType $className)
    {
        $this->beConstructedWith($className);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ImprovedClassSource::class);
    }

    public function it_can_have_parent(ClassType $parent)
    {
        $this->addParent($parent)->shouldReturn($this);
        $this->hasParent()->shouldReturn(true);
        $this->getParent()->shouldReturn($parent);
    }

    public function it_cant_have_more_then_one_parent(ClassType $parent, ClassType $secondParent)
    {
        $this->addParent($parent)->shouldReturn($this);

        $this->shouldThrow(\Exception::class)->duringAddParent($secondParent);
    }

    public function it_will_return_null_if_no_parent()
    {
        $this->hasParent()->shouldReturn(false);
        $this->getParent()->shouldReturn(null);
    }

    public function it_will_show_parent_in_all_imports(ClassType $parent)
    {
        $this->addParent($parent)->shouldReturn($this);
        $this->getImports()->shouldReturn([$parent]);
    }

    public function it_can_have_interfaces(InterfaceType $interface1, InterfaceType $interface2)
    {
        $this->hasInterfaces()->shouldReturn(false);
        $this->addInterface($interface1)->shouldReturn($this);
        $this->hasInterfaces()->shouldReturn(true);
        $this->addInterface($interface2)->shouldReturn($this);
        $this->hasInterfaces()->shouldReturn(true);

        $this->getInterfaces()->shouldReturn([$interface1, $interface2]);
    }

    public function it_will_show_interfaces_in_imports(InterfaceType $interface1, InterfaceType $interface2)
    {
        $interface1->getFullName()->willReturn('InterfaceType1');
        $interface2->getFullName()->willReturn('InterfaceType2');

        $this->addInterface($interface1)->shouldReturn($this);
        $this->addInterface($interface2)->shouldReturn($this);

        $this->getImports()->shouldReturn([$interface1, $interface2]);
    }

    public function it_can_have_traits(TraitType $trait1, TraitType $trait2)
    {
        $this->hasTraits()->shouldReturn(false);
        $this->addTrait($trait1)->shouldReturn($this);
        $this->hasTraits()->shouldReturn(true);
        $this->addTrait($trait2)->shouldReturn($this);
        $this->hasTraits()->shouldReturn(true);

        $this->getTraits()->shouldReturn([$trait1, $trait2]);
    }

    public function it_will_show_traits_in_imports(TraitType $trait1, TraitType $trait2)
    {
        $trait1->getFullName()->willReturn('TraitType1');
        $trait2->getFullName()->willReturn('TraitType2');

        $this->addTrait($trait1)->shouldReturn($this);
        $this->addTrait($trait2)->shouldReturn($this);

        $this->getImports()->shouldReturn([$trait1, $trait2]);
    }

    public function it_can_have_constructor_defined(ConstructorMethod $constructor)
    {
        $constructor->getMethodParameters()->willReturn([]);

        $this->hasConstructorMethod()->shouldReturn(false);
        $this->addConstructorMethod($constructor)->shouldReturn($this);
        $this->hasConstructorMethod()->shouldReturn(true);
        $this->getConstructorMethod()->shouldReturn($constructor);
    }

    public function it_can_not_have_more_then_one_constructor(ConstructorMethod $constructor, ConstructorMethod $secondConstructorMethod)
    {
        $constructor->getMethodParameters()->willReturn([]);
        $this->addConstructorMethod($constructor)->shouldReturn($this);

        $this->shouldThrow(\Exception::class)->duringAddConstructorMethod($secondConstructorMethod);
    }

    public function it_will_return_null_if_no_constructor()
    {
        $this->hasConstructorMethod()->shouldReturn(false);
        $this->getConstructorMethod()->shouldReturn(null);
    }

    public function it_has_constructor_params_in_imports(
        ConstructorMethod $constructor,
        Parameter $param,
        ClassType $paramClassType
    ) {
        $constructor->getMethodParameters()->willReturn([$param]);
        $param->getName()->willReturn('paramName');
        $param->hasType()->willReturn(true);
        $param->getType()->willReturn($paramClassType);

        $this->addConstructorMethod($constructor)->shouldReturn($this);
        $this->getImports()->shouldReturn([$paramClassType]);
    }

    public function it_will_not_put_constructor_parameters_as_class_properties(
        ConstructorMethod $constructor,
        Parameter $param,
        ClassType $paramClassType
    ) {
        $constructor->getMethodParameters()->willReturn([$param]);
        $param->hasType()->willReturn(true);
        $param->getType()->willReturn($paramClassType);

        $this->addConstructorMethod($constructor)->shouldReturn($this);
    }

    public function it_has_only_constructor_in_methods(ConstructorMethod $constructor)
    {
        $constructor->getMethodParameters()->willReturn([]);

        $this->addConstructorMethod($constructor)->shouldReturn($this);
        $this->getMethods()->shouldReturn([$constructor]);
    }

    public function it_supports_type_declaration_params_in_constructor(
        ConstructorMethod $constructor,
        Parameter $param,
        TypeDeclaration $typeDeclaration
    ) {
        $constructor->getMethodParameters()->willReturn([$param]);
        $param->getName()->willReturn('paramName');
        $param->hasType()->willReturn(true);
        $param->getType()->willReturn($typeDeclaration);

        $this->addConstructorMethod($constructor)->shouldReturn($this);
        $this->getMethods()->shouldHaveCount(1);
    }

    public function it_will_not_show_type_declaration_params_from_constructor_in_imports(
        ConstructorMethod $constructor,
        Parameter $param,
        TypeDeclaration $typeDeclaration
    ) {
        $constructor->getMethodParameters()->willReturn([$param]);
        $param->getName()->willReturn('paramName');
        $param->hasType()->willReturn(true);
        $param->getType()->willReturn($typeDeclaration);

        $this->addConstructorMethod($constructor)->shouldReturn($this);
        $this->getImports()->shouldReturn([]);
    }

    public function it_supports_plain_params_in_constructor(
        ConstructorMethod $constructor,
        Parameter $param
    ) {
        $constructor->getMethodParameters()->willReturn([$param]);
        $param->getName()->willReturn('paramName');
        $param->hasType()->willReturn(false);

        $this->addConstructorMethod($constructor)->shouldReturn($this);
        $this->getMethods()->shouldHaveCount(1);
    }

    public function it_will_not_show_plain_params_from_constructor_in_imports(
        ConstructorMethod $constructor,
        Parameter $param
    ) {
        $constructor->getMethodParameters()->willReturn([$param]);
        $param->getName()->willReturn('paramName');
        $param->hasType()->willReturn(false);

        $this->addConstructorMethod($constructor)->shouldReturn($this);
        $this->getImports()->shouldReturn([]);
    }
}
