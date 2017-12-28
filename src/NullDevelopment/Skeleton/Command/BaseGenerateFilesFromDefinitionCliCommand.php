<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Command;

use League\Tactician\CommandBus;
use NullDev\Skeleton\Command\ContainerImplementingTrait;
use NullDev\Skeleton\Path\Readers\FinderFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoaderCollection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

/**
 * @codeCoverageIgnore
 */
abstract class BaseGenerateFilesFromDefinitionCliCommand extends Command implements ContainerAwareInterface
{
    use ContainerImplementingTrait;

    /** @var CommandBus */
    protected $commandBus;
    /** @var Filesystem */
    protected $fileSystem;
    /** @var SymfonyStyle */
    protected $io;

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->commandBus = $this->getService(CommandBus::class);
        $this->fileSystem = $this->getService(Filesystem::class);
        $this->io         = new SymfonyStyle($input, $output);
    }

    protected function loadSourceCode(): array
    {
        $path       = getcwd().'/definitions';
        $yamls      = $this->getService(FinderFactory::class)->create()->files()->in($path)->name('*.yaml');
        $loaders    = $this->getService(DefinitionLoaderCollection::class);

        $classDefinitions = [];

        /** @var SplFileInfo $yaml */
        foreach ($yamls as $yaml) {
            $this->io->writeln('Loading '.$yaml->getFilename());
            $config = $this->loadDefinitionYaml($yaml->getFilename(), $yaml->getPath());

            $classDefinitions[] = $loaders->findAndLoad($config);
        }

        usort($classDefinitions, function ($first, $second) {
            return $first->getGenerationPriority() <=> $second->getGenerationPriority();
        });

        return $classDefinitions;
    }

    protected function loadDefinitionYaml(string $fileName, ?string $path = null): array
    {
        // Define path
        if (null === $path) {
            $path = getcwd().'/definitions/'.$fileName;
        } else {
            $path .= '/'.$fileName;
        }

        // Load Yaml file content
        $fileContent = file_get_contents($path);

        // Parse content
        $parsedYaml = Yaml::parse($fileContent);

        // Return definition part.
        return $parsedYaml['definition'];
    }
}
