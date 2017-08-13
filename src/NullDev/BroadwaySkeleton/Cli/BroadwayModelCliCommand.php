<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use League\Tactician\CommandBus;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @codeCoverageIgnore
 */
class BroadwayModelCliCommand extends BaseSkeletonGeneratorCommand
{
    protected function configure()
    {
        $this->setName('broadway:model')
            ->setDescription('Generates Broadway model')
            ->addOption('className', null, InputOption::VALUE_REQUIRED, 'Class name');
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input  = $input;
        $this->output = $output;
        $this->io     = new SymfonyStyle($input, $output);

        $this->handle();
    }

    protected function handle()
    {
        $className = $this->handleClassNameInput();

        $commandBus = $this->getService(CommandBus::class);

        $modelIdClassType    = ClassType::createFromFullyQualified($className.'Id');
        $modelClassType      = ClassType::createFromFullyQualified($className.'Model');
        $repositoryClassType = ClassType::createFromFullyQualified($className.'Repository');

        $command = new CreateBroadwayModel($modelIdClassType, $modelClassType, $repositoryClassType);

        $outputResources = $commandBus->handle($command);

        foreach ($outputResources as $outputResource) {
            $this->handleGeneratingFile($outputResource);
        }

        $this->io->writeln('DoNE');
    }

    protected function getSectionMessage(): string
    {
        return 'Generate Broadway model';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            '',
            'This command helps you generate Broadway model.',
            '',
            'First, you need to give the class name you want to generate.',
            'IMPORTANT!: Dont add model suffix!',
        ];
    }
}
