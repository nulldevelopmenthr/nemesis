<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticSearchRead;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadEntitySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadProjectorSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadRepositorySourceFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;

/**
 * @see CreateBroadwayElasticSearchReadHandlerSpec
 * @see CreateBroadwayElasticSearchReadHandlerTest
 */
class CreateBroadwayElasticSearchReadHandler
{
    /** @var ReadEntitySourceFactory */
    private $readEntitySourceFactory;
    /** @var ReadRepositorySourceFactory */
    private $readRepositorySourceFactory;
    /** @var ReadProjectorSourceFactory */
    private $readProjectorSourceFactory;
    /** @var SpecGenerator */
    private $specGenerator;
    /** @var PHPUnitTestGenerator */
    private $unitTestGenerator;

    public function __construct(
        ReadEntitySourceFactory $readEntitySourceFactory,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ReadProjectorSourceFactory $readProjectorSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator
    ) {
        $this->readEntitySourceFactory     = $readEntitySourceFactory;
        $this->readRepositorySourceFactory = $readRepositorySourceFactory;
        $this->readProjectorSourceFactory  = $readProjectorSourceFactory;
        $this->specGenerator               = $specGenerator;
        $this->unitTestGenerator           = $unitTestGenerator;
    }

    public function handle(CreateBroadwayElasticSearchRead $command): array
    {
        $classes = [];
        $specs   = [];
        $tests   = [];

        $classes[] = $this->readEntitySourceFactory->create($command->getEntityClassType(), $command->getEntityParameters());
        $classes[] = $this->readRepositorySourceFactory->create($command->getRepositoryClassType());
        $classes[] = $this->readProjectorSourceFactory->create($command->getProjectorClassType(), $command->getEntityParameters());

        foreach ($classes as $class) {
            $specs[] = $this->specGenerator->generate($class);
            $tests[] = $this->unitTestGenerator->generate($class);
        }

        return array_merge($classes, $specs, $tests);
    }
}
