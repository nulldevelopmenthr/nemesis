<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\SourceFactory;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod;
use NullDev\Skeleton\Definition\PHP\Methods\UuidCreateMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\SourceFactory\Uuid4IdentitySourceFactory;
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
        $classSource->addMethod(Argument::type(ToStringMethod::class));
        $classSource->addMethod(Argument::type(UuidCreateMethod::class));
        $classSource->addImport(Argument::type(ClassType::class));

        $this->create($classType)->shouldReturn($classSource);
    }
}
