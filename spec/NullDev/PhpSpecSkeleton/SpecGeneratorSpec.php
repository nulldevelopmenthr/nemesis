<?php

declare(strict_types=1);

namespace spec\NullDev\PhpSpecSkeleton;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeConstructorArgumentsAsGettersMethodFactory;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethodFactory;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethodFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SpecGeneratorSpec extends ObjectBehavior
{
    public function let(
        ClassSourceFactory $factory,
        LetMethodFactory $letMethodFactory,
        InitializableMethodFactory $initializableMethodFactory,
        ExposeConstructorArgumentsAsGettersMethodFactory $exposeConstructorArgumentsAsGettersMethodFactory
    ) {
        $this->beConstructedWith(
            $factory,
            $letMethodFactory,
            $initializableMethodFactory,
            $exposeConstructorArgumentsAsGettersMethodFactory
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecGenerator::class);
    }

    public function TODO_it_can_generate_spec_source_from_class_source(
        $factory,
        ImprovedClassSource $classSource,
        ClassType $classType,
        ImprovedClassSource $specSource
    ) {
        $classSource->getType()->willReturn($classType);
        $classType->getFullName()->willReturn('Namespace\\Class');

        $factory->create(Argument::type(ClassType::class))->willReturn($specSource);
        $this->generate($classSource)->shouldReturn($specSource);
    }
}
