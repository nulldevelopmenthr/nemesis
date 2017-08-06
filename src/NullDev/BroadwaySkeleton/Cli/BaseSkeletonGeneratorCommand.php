<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Command\ContainerImplementingTrait;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\File\FileResource;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Suggestions\ClassSuggestions;
use NullDev\Skeleton\Suggestions\NamespaceSuggestions;
use Sensio\Bundle\GeneratorBundle\Command\Helper\QuestionHelper;
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
abstract class BaseSkeletonGeneratorCommand extends Command implements ContainerAwareInterface
{
    use ContainerImplementingTrait;

    /** @var InputInterface */
    protected $input;
    /** @var OutputInterface */
    protected $output;
    /** @var SymfonyStyle */
    protected $io;

    protected function getConstuctorParameters(): array
    {
        $fields = [];

        while (true) {
            $parameterClassName = $this->askForParameterClassName();

            if (true === empty($parameterClassName)) {
                break;
            }
            $parameterClassType = ClassType::createFromFullyQualified($parameterClassName);
            $parameterName      = $this->askForParameterName(lcfirst($parameterClassType->getName()));

            $fields[] = new Parameter($parameterName, $parameterClassType);
        }

        return $fields;
    }

    protected function handleClassNameInput()
    {
        if (false === empty($this->input->getOption('className'))) {
            return str_replace('/', '\\', $this->input->getOption('className'));
        }
        $this->io->section($this->getSectionMessage());
        $this->io->writeln($this->getIntroductionMessage());

        return $this->askForClassName();
    }

    private $filesToGenerate = [];

    protected function addFileResourceToBeGenerated(FileResource $fileResource)
    {
        $this->filesToGenerate[] = $fileResource;
    }

    protected function generateFileResources()
    {
        foreach ($this->filesToGenerate as $fileResource) {
            $this->handleGeneratingFile($fileResource);
        }
    }

    protected function handleGeneratingFile(FileResource $fileResource)
    {
        $generator = $this->getService(PhpParserGenerator::class);
        $fileName  = $fileResource->getFileName();

        if ($this->fileNotExistsOrShouldBeOwerwritten($fileResource)) {
            $output = $generator->getOutput($fileResource->getClassSource());
            $this->getService(Filesystem::class)->dumpFile($fileName, $output);

            $this->io->writeln("Created '$fileName' file.");
        } else {
            $this->io->writeln("Skipped '$fileName' file.");
        }
    }

    protected function fileNotExistsOrShouldBeOwerwritten(FileResource $fileResource): bool
    {
        if (false === file_exists($fileResource->getFileName())) {
            return true;
        }

        return $this->askOverwriteConfirmationQuestion();
    }

    protected function askForClassName(): string
    {
        $question = new Question($this->getQuestionHelper()->getQuestion('Enter class name', ''));
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
        $question = new Question($this->getQuestionHelper()->getQuestion('Enter parameter class name', ''));
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

    protected function askForParameterName(string $suggestedName)
    {
        return $this->io->ask('Enter parameter name', $suggestedName);
    }

    protected function askOverwriteConfirmationQuestion()
    {
        return $this->io->confirm('File exists, overwrite?', false);
    }

    protected function createSpecSource(ImprovedClassSource $classSource): ImprovedClassSource
    {
        $generator = $this->getService(SpecGenerator::class);

        return $generator->generate($classSource);
    }

    protected function getFileResource(ImprovedClassSource $classSource): FileResource
    {
        $factory = new FileFactory($this->getConfig());

        return $factory->create($classSource);
    }

    protected function getExistingNamespaces(): array
    {
        return $this->getService(NamespaceSuggestions::class)->suggest();
    }

    protected function getExistingClasses(): array
    {
        return $this->getService(ClassSuggestions::class)->suggest();
    }

    protected function getPaths()
    {
        //@TODO: needed?
        return $this->getConfig()->getPaths();
    }

    protected function getQuestionHelper()
    {
        $question = $this->getHelperSet()->get('question');
        if (!$question || get_class($question) !== 'Sensio\Bundle\GeneratorBundle\Command\Helper\QuestionHelper') {
            $question = new QuestionHelper();
            $this->getHelperSet()->set($question);
        }

        return $question;
    }

    abstract protected function getSectionMessage(): string;

    abstract protected function getIntroductionMessage(): array;
}