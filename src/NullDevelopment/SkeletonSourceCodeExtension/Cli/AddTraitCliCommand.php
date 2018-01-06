<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Cli;

use RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AddTraitCliCommand extends BaseCliCommand
{
    protected function configure()
    {
        $this->setName('skeleton:trait:add')
            ->setDescription('Add trait');
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function interact(InputInterface $input, OutputInterface $output): void
    {
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $this->askName();
        $this->io->writeln('Trait can have other traits. Add trait..');
        $traits = $this->askForTraits();
        $this->io->writeln('Trait can have constants. Add constants..');
        $constants = $this->askForConstants();
        $this->io->writeln('Trait can have properties. Add properties..');
        $properties = $this->askForProperties();
        $this->io->writeln('Trait can have methods. Add methods..');
        $methods = $this->askForMethods();

        $definition = [
            'type'       => 'Trait',
            'instanceOf' => $name,
            'traits'     => $traits,
            'constants'  => $constants,
            'properties' => $properties,
            'methods'    => $methods,
        ];

        $this->dumpFile($name, $definition);

        $this->io->writeln('Done.');
    }

    protected function askName(): string
    {
        $question = new Question('Enter trait name', '');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    throw new RuntimeException('No trait name, please enter it');
                }

                $name = str_replace('/', '\\', $input);

                return $name;
            }
        );

        return $this->io->askQuestion($question);
    }
}
