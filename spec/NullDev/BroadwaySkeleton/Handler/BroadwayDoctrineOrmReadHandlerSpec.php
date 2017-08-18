<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmRead;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayDoctrineOrmReadHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadEntitySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadFactorySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadProjectorSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class CreateBroadwayDoctrineOrmReadHandlerSpec extends ObjectBehavior
{
    public function let(
        ReadEntitySourceFactory $readEntitySourceFactory,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ReadFactorySourceFactory $readFactorySourceFactory,
        ReadProjectorSourceFactory $readProjectorSourceFactory
    ) {
        $this->beConstructedWith($readEntitySourceFactory, $readRepositorySourceFactory, $readFactorySourceFactory, $readProjectorSourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayDoctrineOrmReadHandler::class);
    }

    public function it_will_handle_creating_broadway_doctrine_orm_read_side(
        CreateBroadwayDoctrineOrmRead $command,
        ReadEntitySourceFactory $readEntitySourceFactory,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ReadFactorySourceFactory $readFactorySourceFactory,
        ReadProjectorSourceFactory $readProjectorSourceFactory,
        ClassType $entityType,
        Parameter $parameters,
        ClassType $repositoryType,
        ClassType $factoryType,
        ClassType $projectorType,
        ImprovedClassSource $entityClass,
        ImprovedClassSource $repositoryClass,
        ImprovedClassSource $factoryClass,
        ImprovedClassSource $projectorClass
    ) {
        $command->getEntityClassType()->shouldBeCalled()->willReturn($entityType);
        $command->getEntityParameters()->shouldBeCalled()->willReturn([$parameters]);
        $command->getRepositoryClassType()->shouldBeCalled()->willReturn($repositoryType);
        $command->getFactoryClassType()->shouldBeCalled()->willReturn($factoryType);
        $command->getProjectorClassType()->shouldBeCalled()->willReturn($projectorType);

        $readEntitySourceFactory->create($entityType, [$parameters])->shouldBeCalled()->willReturn($entityClass);
        $readRepositorySourceFactory->create($repositoryType)->shouldBeCalled()->willReturn($repositoryClass);
        $readFactorySourceFactory->create($factoryType)->shouldBeCalled()->willReturn($factoryClass);
        $readProjectorSourceFactory->create($projectorType, [$parameters])->shouldBeCalled()->willReturn($projectorClass);

        $this->handleCreateBroadwayDoctrineOrmRead($command)->shouldBeArray();
    }
}
