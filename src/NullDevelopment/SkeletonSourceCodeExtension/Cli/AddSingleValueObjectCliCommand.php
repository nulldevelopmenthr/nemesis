<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Cli;

use RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AddSingleValueObjectCliCommand extends BaseCliCommand
{
    protected function configure()
    {
        $this->setName('skeleton:single:value-object:add')
            ->setDescription('Add single value');
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
        $this->io->writeln('');
        $this->io->writeln('Steps:');
        $this->io->writeln('');
        $this->io->writeln('<info>1) Class name</info>');
        $this->io->writeln('<info>2) Parent class name </info><comment>(leave empty if none)</comment>');
        $this->io->writeln('<info>3) Interface names, one by one </info><comment>(leave empty if none)</comment>');
        $this->io->writeln('<info>4) Trait names, one by one </info><comment>(leave empty if none)</comment>');
        $this->io->writeln('<info>5) Constants, one by one </info><comment>(leave empty if none)</comment>');
        $this->io->writeln('<info>6) Property name </info><comment>(leave empty if none)</comment>');
        $this->io->writeln('<info>7) Methods </info><comment>(leave empty if none)</comment>');

        $name       = $this->askName();
        $parentName = $this->askForParentClassName();
        $interfaces = $this->askForInterfaces();
        $traits     = $this->askForTraits();
        $constants  = $this->askForConstants();

        $instanceOf      = $this->askForPropertyClassName();
        $propertyName    = $this->askForPropertyName('value');
        $hasDefaultValue = (bool) $this->io->askQuestion(new ConfirmationQuestion('Has default value?', false));
        if (true === $hasDefaultValue) {
            $defaultValue = $this->io->ask('What is the default value?');
        } else {
            $defaultValue = null;
        }
        $examples = $this->askForExamples();

        //$properties = $this->askForProperties();
        $methods = $this->askForMethods();

        $definition = [
            'type'        => 'SimpleIdentifier',
            'instanceOf'  => $name,
            'parent'      => $parentName,
            'interfaces'  => $interfaces,
            'traits'      => $traits,
            'constants'   => $constants,
            'properties'  => [],
            'methods'     => $methods,
            'constructor' => [
                $propertyName => [
                    'instanceOf' => $instanceOf,
                    'nullable'   => false,
                    'hasDefault' => $hasDefaultValue,
                    'default'    => $defaultValue,
                    'examples'   => $examples,
                ],
            ],
        ];

        $this->dumpFile($name, $definition);

        $this->io->writeln('Done.');
    }

    protected function askName(): string
    {
        $question = new Question('Enter single value object name', '');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    throw new RuntimeException('No name given, please enter it');
                }

                $name = str_replace('/', '\\', $input);

                return $name;
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function askForParentClassName(): ?string
    {
        $question = new Question('Enter parent class name', '');
        $question->setAutocompleterValues($this->getExistingClasses());
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    return null;
                }

                $name = str_replace('/', '\\', $input);

                return $name;
            }
        );

        return $this->io->askQuestion($question);
    }
}
