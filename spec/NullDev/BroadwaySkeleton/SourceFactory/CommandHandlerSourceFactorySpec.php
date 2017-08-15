<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\SourceFactory;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\LoadAggregateRootModelMethod;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\SaveAggregateRootModelMethod;
use NullDev\BroadwaySkeleton\SourceFactory\CommandHandlerSourceFactory;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommandHandlerSourceFactorySpec extends ObjectBehavior
{
    public function let(ClassSourceFactory $sourceFactory, DefinitionFactory $definitionFactory)
    {
        $this->beConstructedWith($sourceFactory, $definitionFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommandHandlerSourceFactory::class);
    }

    public function it_will_create_source_from_given_class_type_and_constructor_params(
        CommandHandlerClassName $handlerClassName,
        RootRepositoryClassName $repositoryClassName,
        RootIdClassName $idClassName,
        RootModelClassName $modelClassName,
        ClassSourceFactory $sourceFactory,
        DefinitionFactory $definitionFactory,
        ImprovedClassSource $classSource,
        ConstructorMethod $constructorMethod
    ) {
        $sourceFactory
            ->create($handlerClassName)
            ->willReturn($classSource);

        $definitionFactory
            ->createConstructorMethod(Argument::any())
            ->shouldBeCalled()
            ->willReturn($constructorMethod);

        $classSource->addConstructorMethod($constructorMethod)
            ->shouldBeCalled();
        $classSource->addProperty(Argument::type(Parameter::class))
            ->shouldBeCalled();
        $classSource->addMethod(Argument::type(LoadAggregateRootModelMethod::class))
            ->shouldBeCalled();
        $classSource->addMethod(Argument::type(SaveAggregateRootModelMethod::class))
            ->shouldBeCalled();
        $classSource->addImport($idClassName)
            ->shouldBeCalled();
        $classSource->addImport($modelClassName)
            ->shouldBeCalled();

        $this->create($handlerClassName, $repositoryClassName, $idClassName, $modelClassName)
            ->shouldReturn($classSource);
    }
}
