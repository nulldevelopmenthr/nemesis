<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use League\Tactician\CommandBus;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadEntity;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadProjector;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadRepository;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadEntity;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadProjector;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadRepository;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Theater\ReadSide\ReadSideConfig;
use NullDev\Theater\ReadSide\ReadSideConfigFactory;
use NullDev\Theater\ReadSide\ReadSideImplementation;
use NullDev\Theater\ReadSide\ReadSideName;
use NullDev\Theater\ReadSide\ReadSideNamespace;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class BroadwayAddReadSideCliCommand extends BaseSkeletonGeneratorCommand
{
    /** @var SymfonyStyle */
    protected $io;

    /** @var ReadSideName Read side name */
    protected $name;

    /** @var ReadSideNamespace Read side namespace */
    protected $namespace;
    /** @var ReadSideImplementation */
    private $implementation;
    /** @var Parameter[]|array */
    private $readEntityProperties;

    protected function configure()
    {
        $this->setName('broadway:read-side:add')
            ->setDescription('Add Broadway read side');
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function interact(InputInterface $input, OutputInterface $output): void
    {
        $this->name                 = $this->handleNameInput();
        $this->namespace            = $this->handleNamespaceInput();
        $this->implementation       = $this->pickImplementation();
        $this->readEntityProperties = $this->getConstuctorParameters();
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commandBus = $this->getService(CommandBus::class);
        $config     = $this->getTheaterConfig();

        if (true === $config->hasReadSideByName($this->name)) {
            $message = sprintf('Read side with that name already exists');

            $this->io->error($message);

            return;
        }

        $newReadSide = $this->getService(ReadSideConfigFactory::class)->create(
            $this->name,
            $this->namespace,
            $this->implementation,
            $this->readEntityProperties
        );

        $config->addReadSide($newReadSide);
        $this->writeTheaterConfig($config);

        if ($this->io->confirm('Do you want to generate files now?')) {
            $commands = $this->getCommands($newReadSide);

            $outputResources = [];

            foreach ($commands as $command) {
                $outputResources = array_merge($outputResources, $commandBus->handle($command));
            }

            foreach ($outputResources as $outputResource) {
                $this->handleGeneratingFile($outputResource);
            }
        }

        $this->io->writeln('DoNE');
    }

    protected function getCommands(ReadSideConfig $newReadSide): array
    {
        if ('DoctrineORM' === $this->implementation->getValue()) {
            return [
                new CreateBroadwayDoctrineOrmReadEntity($newReadSide->getReadEntity(), $newReadSide->getProperties()),
                new CreateBroadwayDoctrineOrmReadFactory($newReadSide->getReadFactory()),
                new CreateBroadwayDoctrineOrmReadProjector(
                    $newReadSide->getReadProjector(),
                    $newReadSide->getProperties()
                ),
                new CreateBroadwayDoctrineOrmReadRepository($newReadSide->getReadRepository()),
            ];
        } elseif ('Elasticsearch' === $this->implementation->getValue()) {
            return [
                new CreateBroadwayElasticsearchReadEntity($newReadSide->getReadEntity(), $newReadSide->getProperties()),
                new CreateBroadwayElasticsearchReadProjector(
                    $newReadSide->getReadProjector(),
                    $newReadSide->getProperties()
                ),
                new CreateBroadwayElasticsearchReadRepository($newReadSide->getReadRepository()),
            ];
        }

        throw new \LogicException('Err 2324125090: Unsupported implementation');
    }

    protected function handleNameInput()
    {
        $question = new Question('Enter read side name');
        $question->setValidator(
            function ($input) {
                return new ReadSideName((string) $input);
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function handleNamespaceInput()
    {
        $question = new Question('Enter read side namespace');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                return new ReadSideNamespace(str_replace('/', '\\', $input));
            }
        );

        return $this->io->askQuestion($question);
    }

    private function pickImplementation()
    {
        $choices = [
            ReadSideImplementation::DOCTRINE_ORM,
            ReadSideImplementation::ELASTICSEARCH,
        ];

        $defaultChoice = ReadSideImplementation::DOCTRINE_ORM;

        $picked = $this->io->choice('Pick  read side implementation', $choices, $defaultChoice);

        return new ReadSideImplementation($picked);
    }

    protected function getSectionMessage(): string
    {
        return 'Adds new Broadway read side';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            'This command helps you adding new Broadway read side.',
            '',
            'First, you need to pick bounded context.',
            '',
        ];
    }
}
