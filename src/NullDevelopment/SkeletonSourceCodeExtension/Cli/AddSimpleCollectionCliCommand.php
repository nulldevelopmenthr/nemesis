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
class AddSimpleCollectionCliCommand extends BaseCliCommand
{
    protected function configure()
    {
        $this->setName('skeleton:simple:collection:add')
            ->setDescription('Add simple collection');
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
        $name                 = $this->askName();
        $collectionOfInstance = $this->askCollectionOfName();
        $accessor             = $this->askForCollectionAccessor();
        $has                  = $this->askForCollectionOfHas();

        $definition = [
            'type'        => 'SimpleCollection',
            'instanceOf'  => $name,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constants'   => [],
            'constructor' => [
                'elements' => [
                    'instanceOf' => 'array',
                    'nullable'   => false,
                    'hasDefault' => true,
                    'default'    => [],
                ],
            ],
            'collectionOf' => [
                'instanceOf' => $collectionOfInstance,
                'accessor'   => $accessor,
                'has'        => $has,
            ],
        ];

        $this->dumpFile($name, $definition);

        $this->io->writeln('Done.');
    }

    private function askName(): string
    {
        $question = new Question('Enter simple collection name', '');
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

    private function askCollectionOfName(): string
    {
        $question = new Question('Enter class name for entities this collection is for', '');
        $question->setAutocompleterValues($this->getExistingClasses());
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

    private function askForCollectionAccessor(): string
    {
        $question = new Question('Enter entity accessor', 'getId');
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    throw new RuntimeException('No name given, please enter it');
                }

                return $input;
            }
        );

        return $this->io->askQuestion($question);
    }

    private function askForCollectionOfHas(): string
    {
        $question = new Question('Enter identifier used to match entity in collection', '');
        $question->setAutocompleterValues($this->getExistingClasses());
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
}
