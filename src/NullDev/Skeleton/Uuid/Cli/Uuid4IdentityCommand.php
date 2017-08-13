<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Cli;

use League\Tactician\CommandBus;
use NullDev\Skeleton\Command\SimpleSkeletonGeneratorCommand;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
class Uuid4IdentityCommand extends SimpleSkeletonGeneratorCommand
{
    protected function configure()
    {
        $this->setName('uuid4')
            ->setDescription('Generates UUID4 identity value object')
            ->addOption('className', null, InputOption::VALUE_REQUIRED, 'Class name', null);
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $classType = ClassType::createFromFullyQualified($this->className);

        $commandBus = $this->getService(CommandBus::class);

        $command = new CreateUuidClass($classType);

        $outputResources = $commandBus->handle($command);

        foreach ($outputResources as $outputResource) {
            $this->handleGeneratingFile($outputResource);
        }

        $this->io->writeln('DoNE');
    }

    protected function getSectionMessage(): string
    {
        return 'Generate UUID identity value object';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            'This command helps you generate UUID identity value objects.',
            '',
            'First, you need to give the class name you want to generate.',
        ];
    }
}
