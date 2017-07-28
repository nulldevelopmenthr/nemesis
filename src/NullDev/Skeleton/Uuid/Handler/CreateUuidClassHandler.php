<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Handler;

use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\SourceFactory\UuidIdentitySourceFactory;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @see CreateUuidClassHandlerSpec
 * @see CreateUuidClassHandlerTest
 */
class CreateUuidClassHandler
{
    /** @var UuidIdentitySourceFactory */
    private $sourceFactory;
    /** @var PhpParserGenerator */
    private $codeGenerator;
    /** @var Filesystem */
    private $filesystem;

    public function __construct(
        UuidIdentitySourceFactory $sourceFactory,
        PhpParserGenerator $codeGenerator,
        Filesystem $filesystem
    ) {
        $this->sourceFactory = $sourceFactory;
        $this->codeGenerator = $codeGenerator;
        $this->filesystem    = $filesystem;
    }

    public function handle(CreateUuidClass $command): void
    {
        $classSource = $this->sourceFactory->create($command->getClassType());

        $output = $this->codeGenerator->getOutput($classSource);

        $this->filesystem->dumpFile($command->getFileName(), $output);
    }
}
