<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\Handler;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use NullDev\Skeleton\Uuid\Handler\CreateUuidClassHandler;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;
use PhpSpec\ObjectBehavior;

class CreateUuidClassHandlerSpec extends ObjectBehavior
{
    public function let(Uuid4IdentitySourceFactory $sourceFactory)
    {
        $this->beConstructedWith($sourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateUuidClassHandler::class);
    }

    public function it_will_handle_creating_uuid_class(
        CreateUuidClass $command,
        ClassType $classType,
        Uuid4IdentitySourceFactory $sourceFactory,
        ImprovedClassSource $classSource
    ) {
        $command->getClassType()
            ->shouldBeCalled()
            ->willReturn($classType);

        $sourceFactory->create($classType)
            ->shouldBeCalled()
            ->willReturn($classSource);

        $this->handleCreateUuidClass($command)->shouldReturn([$classSource]);
    }
}
