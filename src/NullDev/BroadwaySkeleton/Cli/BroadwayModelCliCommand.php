<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use League\Tactician\CommandBus;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\Skeleton\Command\ContainerImplementingTrait;
use NullDev\Skeleton\Suggestions\NamespaceSuggestions;
use NullDev\Theater\BoundedContext\BoundedContextConfigFactory;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @codeCoverageIgnore
 */
class BroadwayModelCliCommand extends BaseSkeletonGeneratorCommand
{
    use ContainerImplementingTrait;

    /** @var SymfonyStyle */
    protected $io;

    /** @var ContextName Bounded context name */
    protected $name;

    /** @var ContextNamespace Bounded context namespace */
    protected $namespace;

    protected function configure()
    {
        $this->setName('broadway:model')
            ->setDescription('Generates Broadway model')
            ->addOption('name', null, InputOption::VALUE_REQUIRED, 'Bounded context name')
            ->addOption('namespace', null, InputOption::VALUE_REQUIRED, 'Bounded context namespace');
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function interact(InputInterface $input, OutputInterface $output): void
    {
        $name      = $input->getOption('name');
        $namespace = str_replace('/', '\\', $input->getOption('namespace'));

        $this->io->section($this->getSectionMessage());
        $this->io->writeln($this->getIntroductionMessage());

        if (false === empty($name)) {
            $this->name = new ContextName($name);
            $this->io->writeln('Using <info>'.$name.'</info> as name.');
        } else {
            $this->name = $this->handleNameInput();
        }

        if (false === empty($namespace)) {
            $this->namespace = new ContextNamespace($namespace);
            $this->io->writeln('Using <info>'.$namespace.'</info> as namespace.');
        } else {
            $this->namespace = $this->handleNamespaceInput();
        }
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commandBus = $this->getService(CommandBus::class);
        $newContext = $this->getService(BoundedContextConfigFactory::class)->create($this->name, $this->namespace);

        $command = new CreateBroadwayModel(
            $newContext->getRootIdClassName(),
            $newContext->getModelClassName(),
            $newContext->getRepositoryClassName(),
            $newContext->getCommandHandlerClassName()
        );

        $outputResources = $commandBus->handle($command);

        foreach ($outputResources as $outputResource) {
            $this->handleGeneratingFile($outputResource);
        }

        $this->io->writeln('DoNE');
    }

    protected function handleNameInput()
    {
        $question = new Question('Enter bounded context name');
        $question->setValidator(
            function ($input) {
                return new ContextName((string) $input);
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function handleNamespaceInput()
    {
        $question = new Question('Enter bounded context namespace');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                return new ContextNamespace(str_replace('/', '\\', $input));
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function getExistingNamespaces(): array
    {
        return $this->getService(NamespaceSuggestions::class)->suggest();
    }

    protected function getSectionMessage(): string
    {
        return 'Generate Broadway model';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            'This command helps you generate Broadway model.',
            '',
            'First, you need to give the class name you want to generate.',
            'IMPORTANT!: Dont add model suffix!',
        ];
    }
}
