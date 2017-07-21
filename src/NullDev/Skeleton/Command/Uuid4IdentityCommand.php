<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDev\Skeleton\SourceFactory\UuidIdentitySourceFactory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @codeCoverageIgnore
 */
class Uuid4IdentityCommand extends SimpleSkeletonGeneratorCommand
{
    protected function configure()
    {
        $this->setName('uuid4')
            ->setDescription('Generates UUID4 identity value object')
            ->addOption('className', null, InputOption::VALUE_REQUIRED, 'Class name');
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $classSource  = $this->getSource(ClassType::create($this->className));
        $fileResource = $this->getFileResource($classSource);

        $this->addFileResourceToBeGenerated($fileResource);

        if (true === $this->shouldGeneratePhpSpecFile()) {
            $this->createSpecFile($classSource);
        }

        $this->generateFileResources();
    }

    protected function getSource(ClassType $classType): ImprovedClassSource
    {
        return $this->getService(UuidIdentitySourceFactory::class)->create($classType);
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
