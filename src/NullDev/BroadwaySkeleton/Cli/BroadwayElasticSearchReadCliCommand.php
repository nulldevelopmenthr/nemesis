<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticSearchRead;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayElasticSearchReadHandler;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\Exception\Example\PendingException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 * @SuppressWarnings(PHPMD.NPathComplexity)
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 * @codeCoverageIgnore
 */
class BroadwayElasticSearchReadCliCommand extends BaseSkeletonGeneratorCommand
{
    protected function configure()
    {
        $this->setName('broadway:read:elastic-search')
            ->setDescription('Generates Broadway read using ElasticSearch engine')
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
        $generator = $this->getService(PhpParserGenerator::class);

        $className            = $this->handleClassNameInput();
        $readEntityProperties = $this->getConstuctorParameters();

        //Entity
        $readEntityClassType    = ClassType::createFromFullyQualified($className.'Entity');
        $repositoryClassType    = ClassType::createFromFullyQualified($className.'Repository');
        $readProjectorClassType = ClassType::createFromFullyQualified($className.'Projector');

        $command = new CreateBroadwayElasticSearchRead(
            $readEntityClassType,
            $readEntityProperties,
            $repositoryClassType,
            $readProjectorClassType
        );

        $sources = $this->getSources($command);

        foreach ($sources as $source) {
            $fileName = $this->getFilePath($source);

            $output = $generator->getOutput($source);
            $this->handleGeneratingFile2($fileName, $output);
        }

        $this->io->writeln('DoNE');
    }

    protected function getSources(CreateBroadwayElasticSearchRead $command): array
    {
        return $this->getService(CreateBroadwayElasticSearchReadHandler::class)->handle($command);
    }

    protected function getFilePath(ImprovedClassSource $classSource): string
    {
        return $this->getService(FileFactory::class)->getPath($classSource);
    }

    protected function handleGeneratingFile2(string $fileName, string $output): void
    {
        if ($this->fileNotExistsOrShouldBeOwerwritten2($fileName)) {
            $this->getService(Filesystem::class)->dumpFile($fileName, $output);

            $this->io->writeln("Created '$fileName' file.");
        } else {
            $this->io->writeln("Skipped '$fileName' file.");
        }
    }

    private function fileNotExistsOrShouldBeOwerwritten2(string $fileName): bool
    {
        if (false === file_exists($fileName)) {
            return true;
        }

        return $this->askOverwriteConfirmationQuestion2($fileName);
    }

    private function askOverwriteConfirmationQuestion2(string $fileName): bool
    {
        return $this->io->confirm("File '$fileName' exists, overwrite?", false);
    }

    protected function getSectionMessage(): string
    {
        return 'Generate Broadway read models';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            '',
            'This command helps you generate Broadway read model.',
            '',
            'First, you need to give the class name you want to generate.',
            'IMPORTANT!: Dont add suffixes!',
        ];
    }

    protected function createGenerator()
    {
        throw new PendingException();
    }
}
