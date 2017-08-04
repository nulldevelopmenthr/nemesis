<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Command;

use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @codeCoverageIgnore
 */
abstract class SimpleSkeletonGeneratorCommand extends Command implements ContainerAwareInterface
{
    use ContainerImplementingTrait;

    /** @var string name of the class we want to generate */
    protected $className;

    /** @var SymfonyStyle */
    protected $io;

    private $existingNamespaces;
    private $existingClasses;

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->className = str_replace('/', '\\', $input->getOption('className'));
        $this->io        = new SymfonyStyle($input, $output);
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function interact(InputInterface $input, OutputInterface $output): void
    {
        $this->className = $this->handleClassNameInput();
    }

    protected function handleClassNameInput(): string
    {
        if (false === empty($this->className)) {
            return $this->className;
        }
        $this->io->section($this->getSectionMessage());
        $this->io->writeln($this->getIntroductionMessage());

        return $this->askForClassName();
    }

    protected function handleGeneratingFile(string $fileName, string $output): void
    {
        if ($this->fileNotExistsOrShouldBeOwerwritten($fileName)) {
            $this->getService(Filesystem::class)->dumpFile($fileName, $output);

            $this->io->writeln("Created '$fileName' file.");
        } else {
            $this->io->writeln("Skipped '$fileName' file.");
        }
    }

    private function fileNotExistsOrShouldBeOwerwritten(string $fileName): bool
    {
        if (false === file_exists($fileName)) {
            return true;
        }

        return $this->askOverwriteConfirmationQuestion($fileName);
    }

    private function askForClassName(): string
    {
        $question = new Question('Enter class name');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    throw new \RuntimeException('No class name, please enter it');
                }

                $className = str_replace('/', '\\', $input);

                // Check there is namespace defined.
                if (false === strpos($input, '\\')) {
                    throw new \RuntimeException('No namespace, please enter it');
                }

                return $className;
            }
        );

        return $this->io->askQuestion($question);
    }

    private function askOverwriteConfirmationQuestion(string $fileName): bool
    {
        return $this->io->confirm("File '$fileName' exists, overwrite?", false);
    }

    protected function getFilePath(ImprovedClassSource $classSource): string
    {
        return $this->getService(FileFactory::class)->getPath($classSource);
    }

    protected function getExistingNamespaces(): array
    {
        if (null === $this->existingNamespaces) {
            $this->existingNamespaces = (new SourceCodePathReader())->getExistingPaths($this->getPaths());
        }

        return $this->existingNamespaces;
    }

    protected function getExistingClasses(): array
    {
        if (null === $this->existingClasses) {
            $this->existingClasses = (new SourceCodePathReader())->getExistingClasses($this->getPaths());
        }

        return $this->existingClasses;
    }

    private function getPaths(): array
    {
        return $this->getConfig()->getPaths();
    }

    abstract protected function getSectionMessage(): string;

    abstract protected function getIntroductionMessage(): array;
}
