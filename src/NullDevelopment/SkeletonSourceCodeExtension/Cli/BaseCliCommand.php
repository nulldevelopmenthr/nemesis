<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Cli;

use NullDev\Skeleton\Command\ContainerImplementingTrait;
use NullDev\Skeleton\Suggestions\ClassSuggestions;
use NullDev\Skeleton\Suggestions\InterfaceSuggestions;
use NullDev\Skeleton\Suggestions\NamespaceSuggestions;
use NullDev\Skeleton\Suggestions\TraitSuggestions;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class BaseCliCommand extends Command implements ContainerAwareInterface
{
    use ContainerImplementingTrait;

    /** @var SymfonyStyle */
    protected $io;

    protected function dumpFile(string $name, $definition)
    {
        $yaml = Yaml::dump(['definition' => $definition], 7, 2);

        $this->getFileSystem()->dumpFile($this->getPath($name), $yaml);
    }

    protected function getDefinitionsPath(): string
    {
        return getcwd().'/definitions/';
    }

    protected function getPath(string $name): string
    {
        return $this->getDefinitionsPath().str_replace('\\', '/', $name).'.yaml';
    }

    protected function askForConstants(): array
    {
        $constants = [];

        while (true) {
            $name = $this->askForConstantName();

            if (true === empty($name)) {
                break;
            }

            $value = $this->askForConstantValue();

            $constants[$name] = $value;
        }

        return $constants;
    }

    protected function askForConstantName()
    {
        $question = new Question('Enter constant name', '');
        // Allow empty value so entering of constants can end.
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

    protected function askForConstantValue()
    {
        return $this->io->ask('Enter constant value');
    }

    /**
     * @TODO
     */
    protected function askForTraits(): array
    {
        $traits = [];

        while (true) {
            $traitName = $this->askForTraitName();

            if (null === $traitName) {
                break;
            }

            $traits[] = $traitName;
        }

        return $traits;
    }

    protected function askForTraitName(): ?string
    {
        $question = new Question('Enter trait name', '');
        $question->setAutocompleterValues($this->getExistingTraits());
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    return null;
                }

                return str_replace('/', '\\', $input);
            }
        );

        return $this->io->askQuestion($question);
    }

    /**
     * @TODO
     */
    protected function askForProperties(): array
    {
        $properties = [];

        while (true) {
            $propertyClassName = $this->askForPropertyClassName();

            if (true === empty($propertyClassName)) {
                break;
            }
            $className = ClassName::create(str_replace('/', '\\', $propertyClassName));

            $suggestedName = lcfirst($className->getName());

            $propertyName = $this->askForPropertyName($suggestedName);

            $nullable        = $this->io->askQuestion(new ConfirmationQuestion('Is nullable?', false));
            $hasDefaultValue = (bool) $this->io->askQuestion(new ConfirmationQuestion('Has default value?', false));

            if (true === $hasDefaultValue) {
                $defaultValue = $this->io->ask('What is the default value?');
            } else {
                $defaultValue = null;
            }
            $examples = [];

            $properties[$propertyName] = [
                'instanceOf' => $propertyClassName,
                'nullable'   => $nullable,
                'hasDefault' => $hasDefaultValue,
                'default'    => $defaultValue,
                'examples'   => $examples,
            ];

            $this->io->writeln('Done adding new property. Do you want to add more?');
        }

        return $properties;
    }

    protected function askForPropertyClassName()
    {
        $question = new Question('Enter property class name', '');
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

    protected function askForPropertyName(string $suggestedName)
    {
        return $this->io->ask('Enter property name', $suggestedName);
    }

    /**
     * @TODO
     */
    protected function askForMethods(): array
    {
        return [];
    }

    ///
    /// Helper methods
    ///
    ///
    ///

    protected function getFileSystem(): Filesystem
    {
        return $this->getService(Filesystem::class);
    }

    protected function getExistingNamespaces(): array
    {
        return $this->getService(NamespaceSuggestions::class)->suggest();
    }

    protected function getExistingClasses(): array
    {
        return $this->getService(ClassSuggestions::class)->suggest();
    }

    protected function getExistingInterfaces(): array
    {
        return $this->getService(InterfaceSuggestions::class)->suggest();
    }

    protected function getExistingTraits(): array
    {
        return $this->getService(TraitSuggestions::class)->suggest();
    }
}
