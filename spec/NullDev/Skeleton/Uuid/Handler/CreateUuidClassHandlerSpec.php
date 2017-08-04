<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\Handler;

use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\SourceFactory\Uuid4IdentitySourceFactory;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use NullDev\Skeleton\Uuid\Handler\CreateUuidClassHandler;
use PhpSpec\ObjectBehavior;

class CreateUuidClassHandlerSpec extends ObjectBehavior
{
    public function let(
        Uuid4IdentitySourceFactory $sourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $testGenerator
    ) {
        $this->beConstructedWith($sourceFactory, $specGenerator, $testGenerator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateUuidClassHandler::class);
    }

    public function it_will_handle_creating_uuid_class(
        CreateUuidClass $command,
        ClassType $classType,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $testGenerator,
        Uuid4IdentitySourceFactory $sourceFactory,
        ImprovedClassSource $classSource,
        ImprovedClassSource $specSource,
        ImprovedClassSource $testSource
    ) {
        $command->getClassType()
            ->shouldBeCalled()
            ->willReturn($classType);

        $sourceFactory->create($classType)
            ->shouldBeCalled()
            ->willReturn($classSource);

        $specGenerator->generate($classSource)
            ->shouldBeCalled()
            ->willReturn($specSource);

        $testGenerator->generate($classSource)
            ->shouldBeCalled()
            ->willReturn($testSource);

        $this->handle($command)->shouldReturn([$classSource, $specSource, $testSource]);
    }
}
