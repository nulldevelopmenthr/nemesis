<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\Handler;

use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\SourceFactory\UuidIdentitySourceFactory;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use NullDev\Skeleton\Uuid\Handler\CreateUuidClassHandler;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;

class CreateUuidClassHandlerSpec extends ObjectBehavior
{
    public function let(
        UuidIdentitySourceFactory $sourceFactory,
        PhpParserGenerator $codeGenerator,
        Filesystem $filesystem
    ) {
        $this->beConstructedWith($sourceFactory, $codeGenerator, $filesystem);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateUuidClassHandler::class);
    }

    public function it_will_handle_creating_uuid_class(
        CreateUuidClass $command,
        ClassType $classType,
        UuidIdentitySourceFactory $sourceFactory,
        PhpParserGenerator $codeGenerator,
        Filesystem $filesystem,
        ImprovedClassSource $classSource
    ) {
        $command->getClassType()
            ->shouldBeCalled()
            ->willReturn($classType);

        $command->getFileName()
            ->shouldBeCalled()
            ->willReturn('/path/filename.php');

        $sourceFactory->create($classType)
            ->shouldBeCalled()
            ->willReturn($classSource);

        $codeGenerator->getOutput($classSource)
            ->shouldBeCalled()
            ->willReturn('output');

        $filesystem->dumpFile('/path/filename.php', 'output')
            ->shouldBeCalled();

        $this->handle($command);
    }
}
