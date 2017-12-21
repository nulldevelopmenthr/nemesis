<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\Command;

use Exception;
use League\Tactician\CommandBus;
use NullDev\Skeleton\Command\ContainerImplementingTrait;
use NullDev\Skeleton\Path\Readers\FinderFactory;
use NullDevelopment\Skeleton\ObjectConfigurationLoaderCollection;
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
class GenerateAllFilesFromDefinitionCliCommand extends Command implements ContainerAwareInterface
{
    use ContainerImplementingTrait;

    /** @var SymfonyStyle */
    protected $io;

    protected function configure()
    {
        $this->setName('generate:definition:all')
            ->setDescription('Generate all files from definition');
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->io = new SymfonyStyle($input, $output);

        $path       = getcwd().'/definitions';
        $yamls      = $this->getService(FinderFactory::class)->create()->files()->in($path)->name('*.yaml');
        $loaders    = $this->getService(ObjectConfigurationLoaderCollection::class);
        $commandBus = $this->getService(CommandBus::class);
        $fileSystem = $this->getService(Filesystem::class);

        /** @var SplFileInfo $yaml */
        foreach ($yamls as $yaml) {
            $this->io->writeln('Loading '.$yaml->getFilename());
            $config = $this->loadDefinitionYaml($yaml->getFilename(), $yaml->getPath());

            $classDefinition = $loaders->findAndLoad($config);

            try {
                $results = $commandBus->handle($classDefinition);
                foreach ($results as $result) {
                    $fileSystem->dumpFile($result->getFileName(), $result->getOutput());
                }
            } catch (Exception $e) {
                $this->io->writeln($e->getMessage());
            }
        }

        $this->io->writeln('Done!');
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

    protected function getSectionMessage(): string
    {
        return 'Generate all files from definitions';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            'This command helps you generate all files defined in definitions folder.',
        ];
    }
}
