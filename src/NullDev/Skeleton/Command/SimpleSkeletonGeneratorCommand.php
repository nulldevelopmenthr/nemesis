<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Command;

use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\Skeleton\Definition\PHP\Types\Type;
use NullDev\Skeleton\Definition\PHP\Types\TypeFactory;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\File\FileGenerator;
use NullDev\Skeleton\File\FileResource;
use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @codeCoverageIgnore
 */
abstract class SimpleSkeletonGeneratorCommand extends Command implements ContainerAwareInterface
{
    use ContainerImplementingTrait;

    /** @var string name of the class we want to generate */
    protected $className;

    /** @var bool Should phpspec file(s) be generated as well? */
    private $generatePhpSpecFile = true;

    /** @var bool Should PHPUnit file(s) be generated as well? */
    private $generatePhpUnitFile = true;

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

        $this->generatePhpSpecFile = $this->io->confirm('Create phpspec file(s)?', true);
        $this->generatePhpUnitFile = $this->io->confirm('Create PHPUnit file(s)?', true);
    }

    protected function shouldGeneratePhpSpecFile(): bool
    {
        return $this->generatePhpSpecFile;
    }

    protected function shouldGeneratePhpUnitFile(): bool
    {
        return $this->generatePhpUnitFile;
    }

    protected function handleClassNameInput(): string
    {
        if (null !== $this->className) {
            return $this->className;
        }
        $this->io->section($this->getSectionMessage());
        $this->io->writeln($this->getIntroductionMessage());

        return $this->askForClassName();
    }

    private $filesToGenerate = [];

    protected function createSpecFile(ImprovedClassSource $classSource): void
    {
        $specSource   = $this->createSpecSource($classSource);
        $specResource = $this->getFileResource($specSource);
        $this->addFileResourceToBeGenerated($specResource);
    }

    protected function addFileResourceToBeGenerated(FileResource $fileResource): void
    {
        $this->filesToGenerate[] = $fileResource;
    }

    protected function generateFileResources(): void
    {
        foreach ($this->filesToGenerate as $fileResource) {
            $this->handleGeneratingFile($fileResource);
        }
    }

    private function handleGeneratingFile(FileResource $fileResource): void
    {
        if ($this->fileNotExistsOrShouldBeOwerwritten($fileResource)) {
            $this->createFile($fileResource);
            $this->io->writeln('Created "'.$fileResource->getFileName().'" file.');
        } else {
            $this->io->writeln('Skipped "'.$fileResource->getFileName().'" file.');
        }
    }

    private function fileNotExistsOrShouldBeOwerwritten(FileResource $fileResource): bool
    {
        if (false === file_exists($fileResource->getFileName())) {
            return true;
        }

        return $this->askOverwriteConfirmationQuestion($fileResource);
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

    protected function askForParameterClassName()
    {
        $question = new Question('Enter parameter class name');
        $question->setAutocompleterValues($this->getExistingClasses());
        // Allow empty value so entering of parameters can end.
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    return false;
                }

                return $input;
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function askForParameterName(string $suggestedName): string
    {
        return $this->io->ask('Enter parameter name', $suggestedName);
    }

    private function askOverwriteConfirmationQuestion(FileResource $fileResource): bool
    {
        $message = sprintf('File "%s" exists, overwrite?', $fileResource->getFileName());

        return $this->io->confirm($message, false);
    }

    private function createSpecSource(ImprovedClassSource $classSource): ImprovedClassSource
    {
        return $this->getService(SpecGenerator::class)->generate($classSource);
    }

    protected function getFileResource(ImprovedClassSource $classSource): FileResource
    {
        return $this->getService(FileFactory::class)->create($classSource);
    }

    protected function createFile(FileResource $fileResource): void
    {
        $this->getService(FileGenerator::class)->generate($fileResource);
    }

    protected function createClassFromParameterClassName(string $name): Type
    {
        return TypeFactory::createFromName($name);
    }

    protected function getExistingNamespaces(): array
    {
        if (null === $this->existingNamespaces) {
            $sourceCodePathReader = new SourceCodePathReader();

            $this->existingNamespaces = $sourceCodePathReader->getExistingPaths($this->getPaths());
        }

        return $this->existingNamespaces;
    }

    protected function getExistingClasses(): array
    {
        if (null === $this->existingClasses) {
            $sourceCodePathReader = new SourceCodePathReader();

            $this->existingClasses = $sourceCodePathReader->getExistingClasses($this->getPaths());
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
