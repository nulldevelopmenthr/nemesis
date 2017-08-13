<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use NullDev\Skeleton\Definition\PHP\Types\TypeFactory;
use PhpSpec\ObjectBehavior;

class TypeFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(TypeFactory::class);
    }

    public function it_will_return_null_for_empty_type_name()
    {
        $this->create('')->shouldReturn(null);
    }

    public function it_will_return_null_for_null_type_name()
    {
        $this->create(null)->shouldReturn(null);
    }

    public function it_will_return_string()
    {
        $this->create('string')->shouldReturnAnInstanceOf(StringType::class);
    }

    public function it_will_return_integer()
    {
        $this->create('int')->shouldReturnAnInstanceOf(IntType::class);
    }

    public function it_will_return_float()
    {
        $this->create('float')->shouldReturnAnInstanceOf(FloatType::class);
    }

    public function it_will_return_array()
    {
        $this->create('array')->shouldReturnAnInstanceOf(ArrayType::class);
    }

    public function it_will_return_bool()
    {
        $this->create('bool')->shouldReturnAnInstanceOf(BoolType::class);
    }

    public function it_will_return_a_class_type_instance()
    {
        $this->create('\DateTime')->shouldReturnAnInstanceOf(ClassType::class);
    }

    public function it_can_tell_if_type_name_is_type_declaration()
    {
        $this->isTypeDeclaration('string')->shouldReturn(true);
        $this->isTypeDeclaration('int')->shouldReturn(true);
        $this->isTypeDeclaration('float')->shouldReturn(true);
        $this->isTypeDeclaration('array')->shouldReturn(true);
        $this->isTypeDeclaration('bool')->shouldReturn(true);
    }

    public function it_can_tell_if_type_name_is_not_a_type_declaration()
    {
        $this->isTypeDeclaration(null)->shouldReturn(false);
        $this->isTypeDeclaration('')->shouldReturn(false);
        $this->isTypeDeclaration('something')->shouldReturn(false);
        $this->isTypeDeclaration('\DateTime')->shouldReturn(false);
    }
}
