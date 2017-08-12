<?php

declare(strict_types=1);

namespace NullDev\Nemesis\Command;

use NullDev\Nemesis\Config\Config;
use NullDev\Nemesis\PhpParserSourceParser;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Command\ContainerImplementingTrait;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @codeCoverageIgnore
 */
class GeneratePHPUnitTestsCliCommand extends Command implements ContainerAwareInterface
{
    use ContainerImplementingTrait;

    /** @var SymfonyStyle */
    protected $io;

    protected function configure()
    {
        $this->setName('generate:phpunit:missing')
            ->setDescription('Generate missing PHPUnit test files');
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->io = new SymfonyStyle($input, $output);

        $reader = $this->getContainer()->get(SourceCodePathReader::class);

        $sourceCodeClasses   = $reader->getSourceClasses($this->getConfig()->getSourceCodePaths());
        $existingTestClasses = $reader->getTestClasses($this->getConfig()->getTestPaths());
        $generator           = $this->getService(PhpParserGenerator::class);
        $sourceParser        = $this->getService(PhpParserSourceParser::class);

        $generateTestClassSources = [];

        foreach ($sourceCodeClasses as /*$sourceCodeClassName =>*/ $sourceCodeFile) {
            $content = file_get_contents($sourceCodeFile->getRealPath());

            $classSource = $sourceParser->parse($content)[0];

            //$classType = ClassType::createFromFullyQualified($sourceCodeClassName);
            //$classSource = new ImprovedClassSource($classType);

            $testSource = $this->createPhpUnit5Source($classSource);

            if (false === array_key_exists($testSource->getFullName(), $existingTestClasses)) {
                $generateTestClassSources[] = $testSource;
            }
        }

        foreach ($generateTestClassSources as $testSource) {
            $fileName = $this->getFilePath($testSource);

            $output = $generator->getOutput($testSource);
            $this->handleGeneratingFile($fileName, $output);
        }

        $this->io->writeln('Done!');
    }

    private function createPhpUnit5Source(ImprovedClassSource $classSource): ImprovedClassSource
    {
        $generator = $this->getService(PHPUnitTestGenerator::class);

        return $generator->generate($classSource);
    }

    private function getConfig(): Config
    {
        return $this->getService(Config::class);
    }

    private function getFilePath(ImprovedClassSource $classSource): string
    {
        return $this->getService(FileFactory::class)->getPath($classSource);
    }

    private function handleGeneratingFile(string $fileName, string $output): void
    {
        if ($this->fileNotExistsOrShouldBeOwerwritten($fileName)) {
            $this->getService(Filesystem::class)->dumpFile($fileName, $output);

            $this->io->writeln("Created '$fileName' file.");
        } else {
            $this->io->writeln("Skipped '$fileName' file.");
        }
    }

    private function fileNotExistsOrShouldBeOwerwritten(string $fileName): bool
    {
        if (false === file_exists($fileName)) {
            return true;
        }

        return $this->askOverwriteConfirmationQuestion($fileName);
    }

    private function askOverwriteConfirmationQuestion(string $fileName): bool
    {
        return $this->io->confirm("File '$fileName' exists, overwrite?", false);
    }

    protected function getSectionMessage(): string
    {
        return 'Generate missing PHPUnit tests';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            'This command helps you generate missing PHPUnit tests.',
        ];
    }
}
