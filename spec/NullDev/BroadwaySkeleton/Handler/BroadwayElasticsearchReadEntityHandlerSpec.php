<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadEntity;
use NullDev\BroadwaySkeleton\Handler\BroadwayElasticsearchReadEntityHandler;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadEntitySourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class BroadwayElasticsearchReadEntityHandlerSpec extends ObjectBehavior
{
    public function let(ReadEntitySourceFactory $readEntitySourceFactory)
    {
        $this->beConstructedWith($readEntitySourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BroadwayElasticsearchReadEntityHandler::class);
    }

    public function it_will_handle_creating_broadway_elastic_search_read_entity(
        CreateBroadwayElasticsearchReadEntity $command,
        ReadEntitySourceFactory $readEntitySourceFactory,
        ClassType $entityType,
        Parameter $parameters,
        ImprovedClassSource $entityClass
    ) {
        $command->getEntityClassType()->shouldBeCalled()->willReturn($entityType);
        $command->getEntityParameters()->shouldBeCalled()->willReturn([$parameters]);

        $readEntitySourceFactory->create($entityType, [$parameters])->shouldBeCalled()->willReturn($entityClass);

        $this->handleCreateBroadwayElasticSearchReadEntity($command)->shouldBeArray();
    }
}
