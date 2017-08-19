<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadProjector;
use NullDev\BroadwaySkeleton\Handler\BroadwayDoctrineOrmReadProjectorHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadProjectorSourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class BroadwayDoctrineOrmReadProjectorHandlerSpec extends ObjectBehavior
{
    public function let(ReadProjectorSourceFactory $readProjectorSourceFactory)
    {
        $this->beConstructedWith($readProjectorSourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayDoctrineOrmReadProjectorHandler::class);
    }

    public function it_will_handle_creating_broadway_doctrine_orm_read_projector(
        CreateBroadwayDoctrineOrmReadProjector $command,
        ReadProjectorSourceFactory $readProjectorSourceFactory,
        Parameter $parameters,
        ClassType $projectorType,
        ImprovedClassSource $projectorClass
    ) {
        $command->getEntityParameters()->shouldBeCalled()->willReturn([$parameters]);
        $command->getProjectorClassType()->shouldBeCalled()->willReturn($projectorType);

        $readProjectorSourceFactory->create($projectorType, [$parameters])->shouldBeCalled()->willReturn($projectorClass);

        $this->handleCreateBroadwayDoctrineOrmReadProjector($command)->shouldBeArray();
    }
}
