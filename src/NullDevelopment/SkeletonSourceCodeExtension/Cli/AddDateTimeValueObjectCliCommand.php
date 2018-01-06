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
class AddDateTimeValueObjectCliCommand extends BaseCliCommand
{
    protected function configure()
    {
        $this->setName('skeleton:datetime:add')
            ->setDescription('Add datetime');
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
        $name       = $this->askName();
        $parentName = 'DateTime';
        $interfaces = [];
        $traits     = [];
        $constants  = [];
        $properties = [];
        $methods    = [];

        $definition = [
            'type'        => 'DateTimeValueObject',
            'instanceOf'  => $name,
            'parent'      => $parentName,
            'interfaces'  => $interfaces,
            'traits'      => $traits,
            'constants'   => $constants,
            'properties'  => $properties,
            'methods'     => $methods,
            'constructor' => [],
        ];

        $this->dumpFile($name, $definition);

        $this->io->writeln('Done.');
    }

    protected function askName(): string
    {
        $question = new Question('Enter datetime name', '');
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
}
