<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Cli;

use NullDev\Skeleton\Command\ContainerImplementingTrait;
use NullDev\Skeleton\Suggestions\ClassSuggestions;
use NullDev\Skeleton\Suggestions\InterfaceSuggestions;
use NullDev\Skeleton\Suggestions\NamespaceSuggestions;
use NullDevelopment\PhpStructure\DataType\Constant;
use Symfony\Component\Console\Command\Command;
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
}
