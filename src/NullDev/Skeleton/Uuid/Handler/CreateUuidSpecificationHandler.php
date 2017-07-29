<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Handler;

use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Uuid\Command\CreateUuidSpecification;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @see CreateUuidSpecificationHandlerSpec
 * @see CreateUuidSpecificationHandlerTest
 */
class CreateUuidSpecificationHandler
{
    /** @var SpecGenerator */
    private $specGenerator;
    /** @var PhpParserGenerator */
    private $codeGenerator;
    /** @var Filesystem */
    private $filesystem;

    public function __construct(
        SpecGenerator $specGenerator,
        PhpParserGenerator $codeGenerator,
        Filesystem $filesystem
    ) {
        $this->specGenerator = $specGenerator;
        $this->codeGenerator = $codeGenerator;
        $this->filesystem    = $filesystem;
    }

    public function handle(CreateUuidSpecification $command): void
    {
        $specificationSource = $this->specGenerator->generate($command->getClassSource());

        $output = $this->codeGenerator->getOutput($specificationSource);

        $this->filesystem->dumpFile($command->getFileName(), $output);
    }
}
