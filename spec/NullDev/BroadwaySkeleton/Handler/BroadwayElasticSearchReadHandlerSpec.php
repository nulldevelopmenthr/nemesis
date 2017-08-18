<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticSearchRead;
use NullDev\BroadwaySkeleton\Handler\BroadwayElasticSearchReadHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadEntitySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadProjectorSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class BroadwayElasticSearchReadHandlerSpec extends ObjectBehavior
{
    public function let(
        ReadEntitySourceFactory $readEntitySourceFactory,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ReadProjectorSourceFactory $readProjectorSourceFactory
    ) {
        $this->beConstructedWith($readEntitySourceFactory, $readRepositorySourceFactory, $readProjectorSourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayElasticSearchReadHandler::class);
    }

    public function it_will_handle_creating_broadway_elastic_search_read_side(
        CreateBroadwayElasticSearchRead $command,
        ReadEntitySourceFactory $readEntitySourceFactory,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ReadProjectorSourceFactory $readProjectorSourceFactory,
        ClassType $entityType,
        Parameter $parameters,
        ClassType $repositoryType,
        ClassType $projectorType,
        ImprovedClassSource $entityClass,
        ImprovedClassSource $repositoryClass,
        ImprovedClassSource $projectorClass
    ) {
        $command->getEntityClassType()->shouldBeCalled()->willReturn($entityType);
        $command->getEntityParameters()->shouldBeCalled()->willReturn([$parameters]);
        $command->getRepositoryClassType()->shouldBeCalled()->willReturn($repositoryType);
        $command->getProjectorClassType()->shouldBeCalled()->willReturn($projectorType);

        $readEntitySourceFactory->create($entityType, [$parameters])->shouldBeCalled()->willReturn($entityClass);
        $readRepositorySourceFactory->create($repositoryType)->shouldBeCalled()->willReturn($repositoryClass);
        $readProjectorSourceFactory->create($projectorType, [$parameters])->shouldBeCalled()->willReturn($projectorClass);

        $this->handleCreateBroadwayElasticSearchRead($command)->shouldBeArray();
    }
}
