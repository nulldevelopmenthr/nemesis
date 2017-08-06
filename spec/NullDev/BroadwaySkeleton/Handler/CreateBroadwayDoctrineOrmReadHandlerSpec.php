<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmRead;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayDoctrineOrmReadHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadEntitySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadFactorySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadProjectorSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadRepositorySourceFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
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
        ReadProjectorSourceFactory $readProjectorSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator
    ) {
        $this->beConstructedWith(
            $readEntitySourceFactory,
            $readRepositorySourceFactory,
            $readFactorySourceFactory,
            $readProjectorSourceFactory,
            $specGenerator,
            $unitTestGenerator
        );
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
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator,
        ClassType $entityType,
        Parameter $parameters,
        ClassType $repositoryType,
        ClassType $factoryType,
        ClassType $projectorType,
        ImprovedClassSource $entityClass,
        ImprovedClassSource $repositoryClass,
        ImprovedClassSource $factoryClass,
        ImprovedClassSource $projectorClass,
        ImprovedClassSource $entitySpec,
        ImprovedClassSource $repositorySpec,
        ImprovedClassSource $factorySpec,
        ImprovedClassSource $projectorSpec,
        ImprovedClassSource $entityTest,
        ImprovedClassSource $repositoryTest,
        ImprovedClassSource $factoryTest,
        ImprovedClassSource $projectorTest
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

        $specGenerator->generate($entityClass)->shouldBeCalled()->willReturn($entitySpec);
        $specGenerator->generate($repositoryClass)->shouldBeCalled()->willReturn($repositorySpec);
        $specGenerator->generate($factoryClass)->shouldBeCalled()->willReturn($factorySpec);
        $specGenerator->generate($projectorClass)->shouldBeCalled()->willReturn($projectorSpec);

        $unitTestGenerator->generate($entityClass)->shouldBeCalled()->willReturn($entityTest);
        $unitTestGenerator->generate($repositoryClass)->shouldBeCalled()->willReturn($repositoryTest);
        $unitTestGenerator->generate($factoryClass)->shouldBeCalled()->willReturn($factoryTest);
        $unitTestGenerator->generate($projectorClass)->shouldBeCalled()->willReturn($projectorTest);

        $this->handle($command)->shouldBeArray();
    }
}
