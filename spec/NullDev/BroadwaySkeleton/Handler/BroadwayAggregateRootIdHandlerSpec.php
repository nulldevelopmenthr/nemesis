<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootId;
use NullDev\BroadwaySkeleton\Handler\BroadwayAggregateRootIdHandler;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use PhpSpec\ObjectBehavior;

class BroadwayAggregateRootIdHandlerSpec extends ObjectBehavior
{
    public function let(Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory)
    {
        $this->beConstructedWith($uuid4IdentitySourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayAggregateRootIdHandler::class);
    }

    public function it_will_handler_creating_broadway_model(
        CreateBroadwayAggregateRootId $command,
        Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory,
        RootIdClassName $rootIdClassName,
        ImprovedClassSource $modelIdClass
    ) {
        $command->getRootIdClassName()
            ->shouldBeCalled()
            ->willReturn($rootIdClassName);

        $uuid4IdentitySourceFactory->create($rootIdClassName)
            ->shouldBeCalled()
            ->willReturn($modelIdClass);

        $this->handleCreateBroadwayAggregateRootId($command)->shouldBeArray();
    }
}
