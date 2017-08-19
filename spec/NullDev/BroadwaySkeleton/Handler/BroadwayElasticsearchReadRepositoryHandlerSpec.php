<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadRepository;
use NullDev\BroadwaySkeleton\Handler\BroadwayElasticsearchReadRepositoryHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class BroadwayElasticsearchReadRepositoryHandlerSpec extends ObjectBehavior
{
    public function let(ReadRepositorySourceFactory $readRepositorySourceFactory)
    {
        $this->beConstructedWith($readRepositorySourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayElasticsearchReadRepositoryHandler::class);
    }

    public function it_will_handle_creating_broadway_elastic_search_read_repository(
        CreateBroadwayElasticsearchReadRepository $command,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ClassType $repositoryType,
        ImprovedClassSource $repositoryClass
    ) {
        $command->getRepositoryClassType()->shouldBeCalled()->willReturn($repositoryType);

        $readRepositorySourceFactory->create($repositoryType)->shouldBeCalled()->willReturn($repositoryClass);

        $this->handleCreateBroadwayElasticSearchReadRepository($command)->shouldBeArray();
    }
}
