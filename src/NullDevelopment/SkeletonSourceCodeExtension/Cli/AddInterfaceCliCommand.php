<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Cli;

use RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Yaml\Yaml;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AddInterfaceCliCommand extends BaseCliCommand
{
    protected function configure()
    {
        $this->setName('skeleton:interface:add')
            ->setDescription('Add interface');
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
        $name       = $this->askForInterfaceName();
        $parentName = $this->askForParentInterfaceName();
        $constants  = $this->askForConstants();
        $methods    = $this->askForMethods();

        $definition = [
            'type'       => 'Interface',
            'instanceOf' => $name,
            'parent'     => $parentName,
            'constants'  => $constants,
            'methods'    => $methods,
        ];

        $yaml = Yaml::dump(['definition' => $definition], 7, 2);

        $this->getFileSystem()->dumpFile($this->getPath($name), $yaml);

        $this->io->writeln('Done.');
    }

    protected function askForInterfaceName(): string
    {
        $question = new Question('Enter interface name', '');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    throw new RuntimeException('No interface name, please enter it');
                }

                $name = str_replace('/', '\\', $input);

                return $name;
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function askForParentInterfaceName(): ?string
    {
        $question = new Question('Enter parent interface name', '');
        $question->setAutocompleterValues($this->getExistingInterfaces());
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
