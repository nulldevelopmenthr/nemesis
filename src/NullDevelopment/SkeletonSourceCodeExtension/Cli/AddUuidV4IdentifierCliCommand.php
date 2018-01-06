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
class AddUuidV4IdentifierCliCommand extends BaseCliCommand
{
    protected function configure()
    {
        $this->setName('skeleton:uuidv4:identifier:add')
            ->setDescription('Add UUID v4 identifier');
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

        $parentName = null;
        $interfaces = [];
        $traits     = [];
        $constants  = [];
        $properties = [];
        $methods    = [];

        $definition = [
            'type'        => 'UuidV4Identifier',
            'instanceOf'  => $name,
            'parent'      => $parentName,
            'interfaces'  => $interfaces,
            'traits'      => $traits,
            'constants'   => $constants,
            'properties'  => $properties,
            'methods'     => $methods,
            'constructor' => [
                'id' => [
                    'instanceOf' => 'string',
                    'nullable'   => false,
                    'hasDefault' => false,
                    'default'    => null,
                    'examples'   => [],
                ],
            ],
        ];

        $this->dumpFile($name, $definition);

        $this->io->writeln('Done.');
    }

    private function askName(): string
    {
        $question = new Question('Enter UUID v4 identifier name', '');
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
