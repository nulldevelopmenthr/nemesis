<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayCommandHandler;
use NullDev\BroadwaySkeleton\SourceFactory\CommandSourceFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class CreateBroadwayCommandHandlerSpec extends ObjectBehavior
{
    public function let(
        CommandSourceFactory $commandSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator
    ) {
        $this->beConstructedWith(
            $commandSourceFactory,
            $specGenerator,
            $unitTestGenerator
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayCommandHandler::class);
    }

    public function it_will_handler_creating_broadway_model(
        CreateBroadwayCommand $command,
        CommandSourceFactory $commandSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator,
        ClassType $classType,
        Parameter $parameter1,
        ImprovedClassSource $class,
        ImprovedClassSource $spec,
        ImprovedClassSource $test
    ) {
        $command->getClassType()
            ->shouldBeCalled()
            ->willReturn($classType);
        $command->getParameters()
            ->shouldBeCalled()
            ->willReturn([$parameter1]);

        $commandSourceFactory->create($classType, [$parameter1])
            ->shouldBeCalled()
            ->willReturn($class);

        $specGenerator->generate($class)
            ->shouldBeCalled()
            ->willReturn($spec);
        $unitTestGenerator->generate($class)
            ->shouldBeCalled()
            ->willReturn($test);

        $this->handle($command)
            ->shouldReturn([$class, $spec, $test]);
    }
}
