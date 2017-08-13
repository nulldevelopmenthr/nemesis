<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use League\Tactician\CommandBus;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @codeCoverageIgnore
 */
class BroadwayCommandCliCommand extends BaseSkeletonGeneratorCommand
{
    protected function configure()
    {
        $this->setName('broadway:command')
            ->setDescription('Generates Broadway command')
            ->addOption('className', null, InputOption::VALUE_REQUIRED, 'Class name');
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input  = $input;
        $this->output = $output;
        $this->io     = new SymfonyStyle($input, $output);

        $className = $this->handleClassNameInput();
        $fields    = $this->getConstuctorParameters();

        $commandBus = $this->getService(CommandBus::class);

        $classType = ClassType::createFromFullyQualified($className);

        $command = new CreateBroadwayCommand($classType, $fields);

        $outputResources = $commandBus->handle($command);

        foreach ($outputResources as $outputResource) {
            $this->handleGeneratingFile($outputResource);
        }

        $this->io->writeln('DoNE');
    }

    protected function getSectionMessage(): string
    {
        return 'Generate Broadway command';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            '',
            'This command helps you generate Broadway commands.',
            '',
            'First, you need to give the class name you want to generate.',
        ];
    }
}
