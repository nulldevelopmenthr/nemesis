<?php

declare(strict_types=1);

namespace NullDev\Nemesis\Command;

use NullDev\Nemesis\Application;
use NullDev\Nemesis\Config\Config;
use NullDev\Nemesis\Config\ConfigFactory;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\File\FileGenerator;
use NullDev\Skeleton\File\FileResource;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 *
 * @codeCoverageIgnore
 */
abstract class BaseCliCommand extends Command implements ContainerAwareInterface
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
            //$configFactory = new ConfigFactory($this->loadConfigData());
            //$this->config  = $configFactory->create();
            $this->config = $this->getContainer()->get(Config::class);
        }

        return $this->config;
    }

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

    /**
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * @throws \LogicException
     *
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        if (null === $this->container) {
            /** @var Application $application */
            $application = $this->getApplication();
            if (null === $application) {
                throw new \LogicException('The container cannot be retrieved as the application instance is not yet set.');
            }
            $this->container = $application->getContainer();
        }

        return $this->container;
    }

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
