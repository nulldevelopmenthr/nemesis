<?php

declare(strict_types=1);

namespace NullDev\Nemesis\Command;

use NullDev\Nemesis\Config\ConfigFactory;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\File\FileGenerator;
use NullDev\Skeleton\File\FileResource;
use NullDev\Skeleton\Paths;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Yaml\Yaml;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class BaseCliCommand extends Command
{
    /** @var SymfonyStyle */
    protected $io;

    private $config;

    protected function getPaths()
    {
        return $this->getConfig()->getPaths();
    }

    protected function getConfig()
    {
        if (null === $this->config) {
            $configFactory = new ConfigFactory($this->loadConfigData());
            $this->config  = $configFactory->create();
        }

        return $this->config;
    }

    private function loadConfigData(): array
    {
        $path = getcwd().'/nemesis.yml';

        if (false === is_file($path)) {
            return $this->getDefaultConfig();
        }

        return Yaml::parse(file_get_contents($path));
    }

    private function getDefaultConfig()
    {
        return [
            'paths' => [
                'code'    => [
                    'src/' => '',
                ],
                'tests' => [
                    'tests/' => 'tests\\',
                ],
            ],
        ];
    }

    ///
    ///
    ///
    ///
    ///

    protected function getFileResource(ImprovedClassSource $classSource): FileResource
    {
        $factory = new FileFactory($this->getPaths());

        return $factory->create($classSource);
    }

    protected function handleGeneratingFile(FileResource $fileResource)
    {
        //@TODO: remove this!!
        $this->createFile($fileResource);
        $this->io->writeln('File "'.$fileResource->getFileName().'" created.');

        return;

        if ($this->fileNotExistsOrShouldBeOwerwritten($fileResource)) {
            $this->createFile($fileResource);
            $this->io->writeln('File "'.$fileResource->getFileName().'" created.');
        } else {
            $this->io->writeln('File "'.$fileResource->getFileName().'" skipped.');
        }
    }

    private function fileNotExistsOrShouldBeOwerwritten(FileResource $fileResource): bool
    {
        if (false === file_exists($fileResource->getFileName())) {
            return true;
        }
        $question = sprintf('File "%s" exists, overwrite?', $fileResource->getFileName());

        return $this->io->confirm($question, false);
    }

    private function createFile(FileResource $fileResource)
    {
        FileGenerator::default()->generate($fileResource);
    }
}
