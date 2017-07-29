<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\Handler;

use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Uuid\Command\CreateUuidSpecification;
use NullDev\Skeleton\Uuid\Handler\CreateUuidSpecificationHandler;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;

class CreateUuidSpecificationHandlerSpec extends ObjectBehavior
{
    public function let(
        SpecGenerator $specGenerator,
        PhpParserGenerator $codeGenerator,
        Filesystem $filesystem
    ) {
        $this->beConstructedWith($specGenerator, $codeGenerator, $filesystem);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateUuidSpecificationHandler::class);
    }

    public function it_will_handle_creating_uuid_specification(
        CreateUuidSpecification $command,
        ImprovedClassSource $classSource,
        ClassType $classType,
        SpecGenerator $specGenerator,
        PhpParserGenerator $codeGenerator,
        Filesystem $filesystem,
        ImprovedClassSource $specificationSource
    ) {
        $command->getClassSource()
            ->shouldBeCalled()
            ->willReturn($classSource);

        $command->getFileName()
            ->shouldBeCalled()
            ->willReturn('/path/filename.php');

        $specGenerator->generate($classSource)
            ->shouldBeCalled()
            ->willReturn($specificationSource);

        $codeGenerator->getOutput($specificationSource)
            ->shouldBeCalled()
            ->willReturn('output');

        $filesystem->dumpFile('/path/filename.php', 'output')
            ->shouldBeCalled();

        $this->handle($command);
    }
}
