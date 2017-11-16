<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use League\Tactician\CommandBus;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootId;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootModel;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootRepository;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommandHandler;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadEntity;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadProjector;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadRepository;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadEntity;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadProjector;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadRepository;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayEvent;
use NullDev\Skeleton\Command\ContainerImplementingTrait;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Suggestions\NamespaceSuggestions;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\ReadSide\ReadSideConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class BroadwayRunCliCommand extends BaseSkeletonGeneratorCommand
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
        $this->setName('broadway:run')
            ->setDescription('Run, lola run');
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
        $commandBus      = $this->getService(CommandBus::class);
        $config          = $this->getTheaterConfig();
        $outputResources = [];

        foreach ($config->getContexts() as $context) {
            $commands = [
                CreateBroadwayAggregateRootId::create($context),
                CreateBroadwayAggregateRootModel::create($context),
                CreateBroadwayAggregateRootRepository::create($context),
                CreateBroadwayCommandHandler::create($context),
            ];

            foreach ($context->getCommands() as $commandConfig) {
                $commands[] = new CreateBroadwayCommand(
                    $commandConfig->getCommandClassName(),
                    $commandConfig->getParameters()
                );
            }

            foreach ($context->getEvents() as $eventConfig) {
                $commands[] = new CreateBroadwayEvent($eventConfig->getEventClassName(), $eventConfig->getParameters());
            }

            foreach ($commands as $command) {
                $outputResources = array_merge($outputResources, $commandBus->handle($command));
            }
        }

        foreach ($config->getReads() as $read) {
            $commands = $this->getReadCommands($read);

            foreach ($commands as $command) {
                $outputResources = array_merge($outputResources, $commandBus->handle($command));
            }
        }

        foreach ($outputResources as $outputResource) {
            if (false === file_exists($outputResource->getFileName())) {
                $this->handleGeneratingFile($outputResource);
            }
        }
        $this->io->writeln('DoNE');
    }

    protected function getReadCommands(ReadSideConfig $read): array
    {
        if ('DoctrineORM' === $read->getImplementation()->getValue()) {
            return [
                new CreateBroadwayDoctrineOrmReadEntity($read->getReadEntity(), $read->getProperties()),
                new CreateBroadwayDoctrineOrmReadFactory($read->getReadFactory()),
                new CreateBroadwayDoctrineOrmReadProjector(
                    $read->getReadProjector(),
                    [
                        new Parameter('repository', $read->getReadRepository()),
                        new Parameter('factory', $read->getReadFactory()),
                    ]
                ),
                new CreateBroadwayDoctrineOrmReadRepository($read->getReadRepository()),
            ];
        } elseif ('Elasticsearch' === $read->getImplementation()->getValue()) {
            return [
                new CreateBroadwayElasticsearchReadEntity($read->getReadEntity(), $read->getProperties()),
                new CreateBroadwayElasticsearchReadProjector(
                    $read->getReadProjector(),
                    [
                        new Parameter('repository', $read->getReadRepository()),
                        new Parameter('factory', $read->getReadFactory()),
                    ]
                ),
                new CreateBroadwayElasticsearchReadRepository($read->getReadRepository()),
            ];
        }

        throw new \LogicException('Err 2324125090: Unsupported implementation');
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
        return 'Adds new Broadway bounded context';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            'This command helps you adding new Broadway bounded context.',
            '',
            'First, you need to give the name & namespace for the bounded context.',
            '',
        ];
    }
}
