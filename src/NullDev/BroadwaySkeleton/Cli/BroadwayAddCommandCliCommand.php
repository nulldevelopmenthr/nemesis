<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\CommandConfig;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\Config\TheaterConfig;
use NullDev\Theater\Naming\CommandClassName;
use RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class BroadwayAddCommandCliCommand extends BaseSkeletonGeneratorCommand
{
    /** @var SymfonyStyle */
    protected $io;

    /** @var TheaterConfig */
    private $config;

    /** @var null|BoundedContextConfig */
    private $context;

    protected function configure()
    {
        $this->setName('broadway:command:add')
            ->setDescription('Add Broadway command');
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io     = new SymfonyStyle($input, $output);
        $this->config = $this->getTheaterConfig();
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function interact(InputInterface $input, OutputInterface $output): void
    {
        if (0 === count($this->config->getContexts())) {
            $this->io->error('There are no context, please run "broadway:bounded-context:add" first');
        } else {
            $this->pickContext();
        }
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (null === $this->context) {
            return;
        }
        $name       = $this->askForCommandName();
        $parameters = $this->getConstuctorParameters();

        $commandClassName = new CommandClassName($name, $this->context->getNamespace().'\Domain\Command');

        $this->context->addCommand(new CommandConfig($name, $commandClassName, $parameters));

        $this->config->replaceContext($this->context);
        $this->writeTheaterConfig($this->config);

        $this->generateDefinition($commandClassName, $parameters);

        $this->io->writeln('DoNE');
    }

    private function generateDefinition(ClassType $commandClassName, array $parameters)
    {
        $className = $commandClassName->getFullName();

        $properties = [];

        /** @var Parameter $parameter */
        foreach ($parameters as $parameter) {
            $properties[$parameter->getName()] = [
                'instanceOf' => $parameter->getTypeFullName(),
                'nullable'   => false,
                'hasDefault' => false,
                'default'    => null,
            ];
        }

        $definition = [
            'type'        => 'BroadwayCommand',
            'instanceOf'  => $className,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constants'   => [],
            'constructor' => $properties,
            'methods'     => [],
        ];

        $this->dumpFile($className, $definition);
    }

    private function pickContext()
    {
        $choices = [];

        foreach ($this->config->getContexts() as $context) {
            $choices[] = (string) $context->getName();
        }
        $defaultChoice = end($choices);

        $picked = $this->io->choice('Pick', $choices, $defaultChoice);

        $this->context = $this->config->getContextByName(new ContextName($picked));
    }

    protected function askForCommandName(): string
    {
        $question = new Question('Enter command name', '');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    throw new RuntimeException('No command name, please enter it');
                }

                $name = str_replace('/', '\\', $input);

                // Check there is namespace defined.
                if (false !== strpos($name, '\\')) {
                    throw new RuntimeException('Command names are generated without namespace!');
                }

                return $name;
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function getSectionMessage(): string
    {
        return 'Adds new Broadway command';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            'This command helps you adding new Broadway command.',
            '',
            'First, you need to pick bounded context.',
            '',
        ];
    }
}
