<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Handler;

use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Uuid\Command\CreateUuidPhpUnitTest;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @see CreateUuidPhpUnitHandlerSpec
 * @see CreateUuidPhpUnitHandlerTest
 */
class CreateUuidPhpUnitHandler
{
    /** @var PHPUnitTestGenerator */
    private $testGenerator;
    /** @var PhpParserGenerator */
    private $codeGenerator;
    /** @var Filesystem */
    private $filesystem;

    public function __construct(PHPUnitTestGenerator $testGenerator,
        PhpParserGenerator $codeGenerator,
        Filesystem $filesystem)
    {
        $this->testGenerator = $testGenerator;
        $this->codeGenerator = $codeGenerator;
        $this->filesystem    = $filesystem;
    }

    public function handle(CreateUuidPhpUnitTest $command): void
    {
        $phpUnitTestSource = $this->testGenerator->generate($command->getClassSource());

        $output = $this->codeGenerator->getOutput($phpUnitTestSource);

        $this->filesystem->dumpFile($command->getFileName(), $output);
    }
}
