<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory;
use NullDev\BroadwaySkeleton\Handler\BroadwayDoctrineOrmReadFactoryHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadFactorySourceFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class BroadwayDoctrineOrmReadFactoryHandlerSpec extends ObjectBehavior
{
    public function let(ReadFactorySourceFactory $readFactorySourceFactory)
    {
        $this->beConstructedWith($readFactorySourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayDoctrineOrmReadFactoryHandler::class);
    }

    public function it_will_handle_creating_broadway_doctrine_orm_read_factory(
        CreateBroadwayDoctrineOrmReadFactory $command,
        ReadFactorySourceFactory $readFactorySourceFactory,
        ClassType $factoryType,
        ImprovedClassSource $factoryClass
    ) {
        $command->getFactoryClassType()->shouldBeCalled()->willReturn($factoryType);

        $readFactorySourceFactory->create($factoryType)->shouldBeCalled()->willReturn($factoryClass);

        $this->handleCreateBroadwayDoctrineOrmReadFactory($command)->shouldBeArray();
    }
}
