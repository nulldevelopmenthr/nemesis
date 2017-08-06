<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmRead;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadEntitySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadFactorySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadProjectorSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadRepositorySourceFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;

/**
 * @see CreateBroadwayDoctrineOrmReadHandlerSpec
 * @see CreateBroadwayDoctrineOrmReadHandlerTest
 */
class CreateBroadwayDoctrineOrmReadHandler
{
    /** @var ReadEntitySourceFactory */
    private $readEntitySourceFactory;
    /** @var ReadRepositorySourceFactory */
    private $readRepositorySourceFactory;
    /** @var ReadFactorySourceFactory */
    private $readFactorySourceFactory;
    /** @var ReadProjectorSourceFactory */
    private $readProjectorSourceFactory;
    /** @var SpecGenerator */
    private $specGenerator;
    /** @var PHPUnitTestGenerator */
    private $unitTestGenerator;

    public function __construct(
        ReadEntitySourceFactory $readEntitySourceFactory,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ReadFactorySourceFactory $readFactorySourceFactory,
        ReadProjectorSourceFactory $readProjectorSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator
    ) {
        $this->readEntitySourceFactory     = $readEntitySourceFactory;
        $this->readRepositorySourceFactory = $readRepositorySourceFactory;
        $this->readFactorySourceFactory    = $readFactorySourceFactory;
        $this->readProjectorSourceFactory  = $readProjectorSourceFactory;
        $this->specGenerator               = $specGenerator;
        $this->unitTestGenerator           = $unitTestGenerator;
    }

    public function handle(CreateBroadwayDoctrineOrmRead $command): array
    {
        $classes = [];
        $specs   = [];
        $tests   = [];

        $classes[] = $this->readEntitySourceFactory->create($command->getEntityClassType(), $command->getEntityParameters());
        $classes[] = $this->readRepositorySourceFactory->create($command->getRepositoryClassType());
        $classes[] = $this->readFactorySourceFactory->create($command->getFactoryClassType());
        $classes[] = $this->readProjectorSourceFactory->create($command->getProjectorClassType(), $command->getEntityParameters());

        foreach ($classes as $class) {
            $specs[] = $this->specGenerator->generate($class);
            $tests[] = $this->unitTestGenerator->generate($class);
        }

        return array_merge($classes, $specs, $tests);
    }
}
