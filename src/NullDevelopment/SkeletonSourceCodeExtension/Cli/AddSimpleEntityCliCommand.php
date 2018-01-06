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
class AddSimpleEntityCliCommand extends BaseCliCommand
{
    protected function configure()
    {
        $this->setName('skeleton:simple:entity:add')
            ->setDescription('Add simple entity');
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
        $parentName = $this->askForParentClassName();
        $interfaces = $this->askForInterfaces();
        $traits     = $this->askForTraits();
        $constants  = $this->askForConstants();
        $properties = $this->askForProperties();
        $methods    = $this->askForMethods();

        $definition = [
            'type'        => 'SimpleIdentifier',
            'instanceOf'  => $name,
            'parent'      => $parentName,
            'interfaces'  => $interfaces,
            'traits'      => $traits,
            'constants'   => $constants,
            'properties'  => [],
            'methods'     => $methods,
            'constructor' => $properties,
        ];

        $this->dumpFile($name, $definition);

        $this->io->writeln('Done.');
    }

    private function askName(): string
    {
        $question = new Question('Enter simple entity name', '');
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

    private function askForParentClassName(): ?string
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
