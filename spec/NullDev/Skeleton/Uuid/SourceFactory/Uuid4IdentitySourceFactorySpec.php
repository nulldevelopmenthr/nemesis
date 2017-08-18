<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\SourceFactory;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Uuid\Definition\PHP\Methods\UuidCreateMethod;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Uuid4IdentitySourceFactorySpec extends ObjectBehavior
{
    public function let(ClassSourceFactory $sourceFactory)
    {
        $this->beConstructedWith($sourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Uuid4IdentitySourceFactory::class);
    }

    public function it_will_create_source_from_given_class_type(
        ClassSourceFactory $sourceFactory,
        ClassType $classType,
        ImprovedClassSource $classSource
    ) {
        $sourceFactory->create($classType)->willReturn($classSource);

        $classSource->addConstructorMethod(Argument::type(ConstructorMethod::class));
        $classSource->addProperty(Argument::type(Property::class));
        $classSource->addGetterMethod(Argument::type(Parameter::class));
        $classSource->addMethod(Argument::type(ToStringMethod::class));
        $classSource->addMethod(Argument::type(UuidCreateMethod::class));
        $classSource->addImport(Argument::type(ClassType::class));

        $this->create($classType)->shouldReturn($classSource);
    }
}
