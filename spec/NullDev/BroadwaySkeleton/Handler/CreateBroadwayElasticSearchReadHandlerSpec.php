<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticSearchRead;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayElasticSearchReadHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadEntitySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadProjectorSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadRepositorySourceFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class CreateBroadwayElasticSearchReadHandlerSpec extends ObjectBehavior
{
    public function let(
        ReadEntitySourceFactory $readEntitySourceFactory,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ReadProjectorSourceFactory $readProjectorSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator
    ) {
        $this->beConstructedWith(
            $readEntitySourceFactory,
            $readRepositorySourceFactory,
            $readProjectorSourceFactory,
            $specGenerator,
            $unitTestGenerator
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayElasticSearchReadHandler::class);
    }

    public function it_will_handle_creating_broadway_elastic_search_read_side(
        CreateBroadwayElasticSearchRead $command,
        ReadEntitySourceFactory $readEntitySourceFactory,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ReadProjectorSourceFactory $readProjectorSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator,
        ClassType $entityType,
        Parameter $parameters,
        ClassType $repositoryType,
        ClassType $projectorType,
        ImprovedClassSource $entityClass,
        ImprovedClassSource $repositoryClass,
        ImprovedClassSource $projectorClass,
        ImprovedClassSource $entitySpec,
        ImprovedClassSource $repositorySpec,
        ImprovedClassSource $projectorSpec,
        ImprovedClassSource $entityTest,
        ImprovedClassSource $repositoryTest,
        ImprovedClassSource $projectorTest
    ) {
        $command->getEntityClassType()->shouldBeCalled()->willReturn($entityType);
        $command->getEntityParameters()->shouldBeCalled()->willReturn([$parameters]);
        $command->getRepositoryClassType()->shouldBeCalled()->willReturn($repositoryType);
        $command->getProjectorClassType()->shouldBeCalled()->willReturn($projectorType);

        $readEntitySourceFactory->create($entityType, [$parameters])->shouldBeCalled()->willReturn($entityClass);
        $readRepositorySourceFactory->create($repositoryType)->shouldBeCalled()->willReturn($repositoryClass);
        $readProjectorSourceFactory->create($projectorType, [$parameters])->shouldBeCalled()->willReturn($projectorClass);

        $specGenerator->generate($entityClass)->shouldBeCalled()->willReturn($entitySpec);
        $specGenerator->generate($repositoryClass)->shouldBeCalled()->willReturn($repositorySpec);
        $specGenerator->generate($projectorClass)->shouldBeCalled()->willReturn($projectorSpec);

        $unitTestGenerator->generate($entityClass)->shouldBeCalled()->willReturn($entityTest);
        $unitTestGenerator->generate($repositoryClass)->shouldBeCalled()->willReturn($repositoryTest);
        $unitTestGenerator->generate($projectorClass)->shouldBeCalled()->willReturn($projectorTest);

        $this->handle($command)->shouldBeArray();
    }
}
