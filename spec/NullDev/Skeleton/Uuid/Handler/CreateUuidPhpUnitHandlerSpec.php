<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\Handler;

use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Uuid\Command\CreateUuidPhpUnitTest;
use NullDev\Skeleton\Uuid\Handler\CreateUuidPhpUnitHandler;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;

class CreateUuidPhpUnitHandlerSpec extends ObjectBehavior
{
    public function let(
        PHPUnitTestGenerator $testGenerator,
        PhpParserGenerator $codeGenerator,
        Filesystem $filesystem
    ) {
        $this->beConstructedWith($testGenerator, $codeGenerator, $filesystem);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateUuidPhpUnitHandler::class);
    }

    public function it_will_handle_creating_uuid_test(
        CreateUuidPhpUnitTest $command,
        ImprovedClassSource $classSource,
        ClassType $classType,
        PHPUnitTestGenerator $testGenerator,
        PhpParserGenerator $codeGenerator,
        Filesystem $filesystem,
        ImprovedClassSource $phpUnitTestSource
    ) {
        $command->getClassSource()
            ->shouldBeCalled()
            ->willReturn($classSource);

        $command->getFileName()
            ->shouldBeCalled()
            ->willReturn('/path/filename.php');

        $testGenerator->generate($classSource)
            ->shouldBeCalled()
            ->willReturn($phpUnitTestSource);

        $codeGenerator->getOutput($phpUnitTestSource)
            ->shouldBeCalled()
            ->willReturn('output');

        $filesystem->dumpFile('/path/filename.php', 'output')
            ->shouldBeCalled();

        $this->handle($command);
    }
}
