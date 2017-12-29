<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use League\Tactician\CommandBus;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayEvent;
use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\EventConfig;
use NullDev\Theater\Config\TheaterConfig;
use NullDev\Theater\Naming\EventClassName;
use RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class BroadwayAddEventCliCommand extends BaseSkeletonGeneratorCommand
{
    /** @var SymfonyStyle */
    protected $io;
    /** @var TheaterConfig */
    private $config;
    /** @var null|BoundedContextConfig */
    private $context;

    protected function configure()
    {
        $this->setName('broadway:event:add')
            ->setDescription('Add Broadway event');
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
        $commandBus = $this->getService(CommandBus::class);

        $name       = $this->askForEventName();
        $parameters = $this->getConstuctorParameters();

        $eventClassName = new EventClassName($name, $this->context->getNamespace().'\Domain\Event');

        $this->context->addEvent(new EventConfig($name, $eventClassName, $parameters));

        $this->config->replaceContext($this->context);
        $this->writeTheaterConfig($this->config);

        $outputResources = $commandBus->handle(new CreateBroadwayEvent($eventClassName, $parameters));

        foreach ($outputResources as $outputResource) {
            $this->handleGeneratingFile($outputResource);
        }

        $this->io->writeln('DoNE');
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

    protected function askForEventName(): string
    {
        $question = new Question('Enter event name', '');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                if (true === empty($input)) {
                    throw new RuntimeException('No event name, please enter it');
                }

                $name = str_replace('/', '\\', $input);

                // Check there is namespace defined.
                if (false !== strpos($name, '\\')) {
                    throw new RuntimeException('Event names are generated without namespace!');
                }

                return $name;
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function getSectionMessage(): string
    {
        return 'Adds new Broadway event';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            'This command helps you adding new Broadway event.',
            '',
            'First, you need to pick bounded context.',
            '',
        ];
    }
}
