<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadEntity;
use NullDev\BroadwaySkeleton\Handler\BroadwayDoctrineOrmReadEntityHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadEntitySourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class BroadwayDoctrineOrmReadEntityHandlerSpec extends ObjectBehavior
{
    public function let(ReadEntitySourceFactory $readEntitySourceFactory)
    {
        $this->beConstructedWith($readEntitySourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayDoctrineOrmReadEntityHandler::class);
    }

    public function it_will_handle_creating_broadway_doctrine_orm_read_entity(
        CreateBroadwayDoctrineOrmReadEntity $command,
        ReadEntitySourceFactory $readEntitySourceFactory,
        ClassType $entityType,
        Parameter $parameters,
        ImprovedClassSource $entityClass
    ) {
        $command->getEntityClassType()->shouldBeCalled()->willReturn($entityType);
        $command->getEntityParameters()->shouldBeCalled()->willReturn([$parameters]);

        $readEntitySourceFactory->create($entityType, [$parameters])->shouldBeCalled()->willReturn($entityClass);

        $this->handleCreateBroadwayDoctrineOrmReadEntity($command)->shouldBeArray();
    }
}
