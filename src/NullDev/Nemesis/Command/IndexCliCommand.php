<?php

declare(strict_types=1);

namespace NullDev\Nemesis\Command;

use NullDev\PHPUnitSkeleton\PHPUnit5TestGenerator;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class IndexCliCommand extends BaseCliCommand
{
    protected function configure()
    {
        $this->setName('index')
            ->setDescription('Index source files');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->io = new SymfonyStyle($input, $output);

        $reader = new SourceCodePathReader();

        $sourceCodeClasses   = $reader->getSourceClasses($this->getConfig()->getSourceCodePaths());
        $existingTestClasses = $reader->getTestClasses($this->getConfig()->getTestPaths());

        $generateTestClassSources = [];

        foreach ($sourceCodeClasses as $sourceCodeClassName) {
            $classType   = ClassType::create($sourceCodeClassName);
            $classSource = new ImprovedClassSource($classType);

            $testSource = $this->createPhpUnit5Source($classSource);

            if (false === array_key_exists($testSource->getFullName(), $existingTestClasses)) {
                $generateTestClassSources[] = $testSource;
            }
        }

        foreach ($generateTestClassSources as $testSource) {
            $testResource = $this->getFileResource($testSource);
            $this->handleGeneratingFile($testResource);
        }

        $this->io->writeln('Done!');
    }

    protected function createPhpUnit5Source(ImprovedClassSource $classSource): ImprovedClassSource
    {
        $generator = PHPUnit5TestGenerator::default();

        return $generator->generate($classSource);
    }
}
