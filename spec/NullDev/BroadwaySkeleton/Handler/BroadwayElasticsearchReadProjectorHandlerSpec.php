<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadProjector;
use NullDev\BroadwaySkeleton\Handler\BroadwayElasticsearchReadProjectorHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadProjectorSourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class BroadwayElasticsearchReadProjectorHandlerSpec extends ObjectBehavior
{
    public function let(ReadProjectorSourceFactory $readProjectorSourceFactory)
    {
        $this->beConstructedWith($readProjectorSourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayElasticsearchReadProjectorHandler::class);
    }

    public function it_will_handle_creating_broadway_elastic_search_read_projector(
        CreateBroadwayElasticsearchReadProjector $command,
        ReadProjectorSourceFactory $readProjectorSourceFactory,
        Parameter $parameters,
        ClassType $projectorType,
        ImprovedClassSource $projectorClass
    ) {
        $command->getEntityParameters()->shouldBeCalled()->willReturn([$parameters]);
        $command->getProjectorClassType()->shouldBeCalled()->willReturn($projectorType);

        $readProjectorSourceFactory->create($projectorType, [$parameters])->shouldBeCalled()->willReturn($projectorClass);

        $this->handleCreateBroadwayElasticSearchReadProjector($command)->shouldBeArray();
    }
}
