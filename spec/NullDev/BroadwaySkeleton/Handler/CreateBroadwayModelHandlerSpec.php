<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayModelHandler;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;
use PhpSpec\ObjectBehavior;

class CreateBroadwayModelHandlerSpec extends ObjectBehavior
{
    public function let(
        Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory,
        EventSourcedAggregateRootSourceFactory $eventSourcedAggregateRootSourceFactory,
        EventSourcingRepositorySourceFactory $eventSourcingRepositorySourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator
    ) {
        $this->beConstructedWith(
            $uuid4IdentitySourceFactory,
            $eventSourcedAggregateRootSourceFactory,
            $eventSourcingRepositorySourceFactory,
            $specGenerator,
            $unitTestGenerator
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayModelHandler::class);
    }

    public function it_will_handler_creating_broadway_model(
        CreateBroadwayModel $command,
        Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory,
        EventSourcedAggregateRootSourceFactory $eventSourcedAggregateRootSourceFactory,
        EventSourcingRepositorySourceFactory $eventSourcingRepositorySourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator,
        ClassType $modelIdType,
        ClassType $modelType,
        ClassType $repositoryType,
        Parameter $modelIdParameter,
        ImprovedClassSource $modelIdClass,
        ImprovedClassSource $modelClass,
        ImprovedClassSource $repositoryClass,
        ImprovedClassSource $modelIdSpec,
        ImprovedClassSource $modelSpec,
        ImprovedClassSource $repositorySpec,
        ImprovedClassSource $modelIdTest,
        ImprovedClassSource $modelTest,
        ImprovedClassSource $repositoryTest
    ) {
        $command->getModelIdType()->shouldBeCalled()->willReturn($modelIdType);
        $command->getModelType()->shouldBeCalled()->willReturn($modelType);
        $command->getRepositoryType()->shouldBeCalled()->willReturn($repositoryType);
        $command->getModelIdAsParameter()->shouldBeCalled()->willReturn($modelIdParameter);

        $uuid4IdentitySourceFactory->create($modelIdType)->shouldBeCalled()->willReturn($modelIdClass);
        $eventSourcedAggregateRootSourceFactory->create($modelType, $modelIdParameter)->shouldBeCalled()->willReturn($modelClass);
        $eventSourcingRepositorySourceFactory->create($repositoryType, $modelType)->shouldBeCalled()->willReturn($repositoryClass);

        $specGenerator->generate($modelIdClass)->shouldBeCalled()->willReturn($modelIdSpec);
        $specGenerator->generate($modelClass)->shouldBeCalled()->willReturn($modelSpec);
        $specGenerator->generate($repositoryClass)->shouldBeCalled()->willReturn($repositorySpec);

        $unitTestGenerator->generate($modelIdClass)->shouldBeCalled()->willReturn($modelIdTest);
        $unitTestGenerator->generate($modelClass)->shouldBeCalled()->willReturn($modelTest);
        $unitTestGenerator->generate($repositoryClass)->shouldBeCalled()->willReturn($repositoryTest);

        $this->handle($command)->shouldBeArray();
    }
}
