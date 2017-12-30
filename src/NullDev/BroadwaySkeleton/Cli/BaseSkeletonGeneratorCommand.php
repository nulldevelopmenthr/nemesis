<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use NullDev\Skeleton\Command\ContainerImplementingTrait;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\TypeFactory;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\File\FileResource;
use NullDev\Skeleton\File\OutputResource;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\Suggestions\ClassSuggestions;
use NullDev\Skeleton\Suggestions\NamespaceSuggestions;
use NullDev\Theater\Config\TheaterConfig;
use NullDev\Theater\Config\TheaterConfigFactory;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

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
            $parameterClassType = TypeFactory::create(str_replace('/', '\\', $parameterClassName));

            $suggestedName = '';
            if (null !== $parameterClassType) {
                $suggestedName = lcfirst($parameterClassType->getName());
            }

            $parameterName = $this->askForParameterName($suggestedName);

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

    protected function handleGeneratingFile(OutputResource $outputResource): void
    {
        $fileName = $outputResource->getFileName();

        if ($this->fileNotExistsOrShouldBeOwerwritten($fileName)) {
            $this->getService(Filesystem::class)->dumpFile($fileName, $outputResource->getOutput());

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

    protected function askForClassName(): string
    {
        $question = new Question('Enter class name', '');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    throw new RuntimeException('No class name, please enter it');
                }

                $className = str_replace('/', '\\', $input);

                // Check there is namespace defined.
                if (false === strpos($className, '\\')) {
                    throw new RuntimeException('No namespace, please enter it');
                }

                return $className;
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function askForParameterClassName()
    {
        $question = new Question('Enter parameter class name', '');
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

    private function askOverwriteConfirmationQuestion(string $fileName): bool
    {
        return $this->io->confirm("File '$fileName' exists, overwrite?", false);
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

    ///
    ///
    ///

    protected function getTheaterConfig(): TheaterConfig
    {
        $path = $this->getTheaterConfigFilePath();

        if (false === file_exists($path)) {
            $config = new TheaterConfig([], []);

            $this->writeTheaterConfig($config);
        } else {
            $configData = Yaml::parse(file_get_contents($path));

            $config = $this->getService(TheaterConfigFactory::class)->createFromArray($configData);
        }

        return $config;
    }

    protected function writeTheaterConfig(TheaterConfig $config)
    {
        $path = $this->getTheaterConfigFilePath();
        $yaml = Yaml::dump($config->toArray(), 7, 2);
        file_put_contents($path, $yaml);
    }

    private function getTheaterConfigFilePath(): string
    {
        return getcwd().'/theater.yml';
    }

    ///
    ///
    ///

    abstract protected function getSectionMessage(): string;

    abstract protected function getIntroductionMessage(): array;
}
