<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Cli;

use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Command\SimpleSkeletonGeneratorCommand;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\SourceFactory\Uuid4IdentitySourceFactory;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use NullDev\Skeleton\Uuid\Handler\CreateUuidClassHandler;
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

        $generator = $this->getService(PhpParserGenerator::class);

        $sources = $this->getSources(
            new CreateUuidClass('', $classType)
        );

        foreach ($sources as $source) {
            $fileName = $this->getFilePath($source);

            $output = $generator->getOutput($source);
            $this->handleGeneratingFile($fileName, $output);
        }

        $this->io->writeln('DoNE');
    }

    protected function getSources(CreateUuidClass $command): array
    {
        return $this->getService(CreateUuidClassHandler::class)->handle($command);
    }

    protected function getSource(ClassType $classType): ImprovedClassSource
    {
        return $this->getService(Uuid4IdentitySourceFactory::class)->create($classType);
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
