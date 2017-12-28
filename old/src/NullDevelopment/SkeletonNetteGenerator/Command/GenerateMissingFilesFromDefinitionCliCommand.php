<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\Command;

use Exception;
use NullDevelopment\Skeleton\SourceCode;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
class GenerateMissingFilesFromDefinitionCliCommand extends BaseGenerateFilesFromDefinitionCliCommand
{
    protected function configure()
    {
        $this->setName('generate:definition:missing')
            ->setDescription('Generate missing files from definition');
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sourceCodeDefinitions = $this->loadSourceCode();

        /** @var SourceCode $sourceCodeDefinition */
        foreach ($sourceCodeDefinitions as $sourceCodeDefinition) {
            try {
                $results = $this->commandBus->handle($sourceCodeDefinition);
                foreach ($results as $result) {
                    if (false === $this->fileSystem->exists($result->getFileName())) {
                        $this->fileSystem->dumpFile($result->getFileName(), $result->getOutput());
                    } else {
                        $this->io->writeln('Skipping '.$result->getFileName().' as it already exists');
                    }
                }
            } catch (Exception $e) {
                $this->io->writeln($e->getMessage());
            }
        }

        $this->io->writeln('Done!');
    }
}
